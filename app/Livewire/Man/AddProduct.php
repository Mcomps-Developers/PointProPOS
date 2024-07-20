<?php

namespace App\Livewire\Man;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;

class AddProduct extends Component
{
    public $category;
    public $name;
    public $image;
    public $price;
    private $company_id;

    public function mount()
    {
        $this->company_id = Company::where('user_id', Auth::id())->first()->id;
    }

    private function generateSKU($model, $column, $length = 8)
    {
        do {
            $sku = Str::random($length);
            $exists = $model::where($column, $sku)->exists();
        } while ($exists);

        return $sku;
    }
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name,NULL,id,company_id,' . $this->company_id,
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5120',
            'category' => 'nullable',
            'price' => 'required|numeric|min:10',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function create()
    {
        $this->validate();
        try {
            $company = Company::where('user_id', Auth::id())->first();
            $product = new Product();
            $product->company_id = $company->id;
            $product->name = $this->name;
            $product->price = $this->price;
            $product->sku = $this->generateSKU(Product::class, 'sku', 8);
            $product->slug = Str::slug($this->name);
            $product->category_id = $this->category;
            $product->user_id = Auth::id();
            if ($this->image) {
                $photoName = Carbon::now()->addMinutes(2)->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('assets/img/products', $photoName);
                $product->image = $photoName;
            }
            $product->save();
            notyf()->position('y', 'top')->success('Product created successfully.');
            return redirect()->to(request()->header('referer'));
        } catch (\Illuminate\Database\QueryException $ex) {
            Log::error('Database error: ' . $ex->getMessage() . ' in ' . $ex->getFile() . ' on line ' . $ex->getLine());
            notyf()->position('y', 'top')->error('Database error occurred. Please try again later.');
            return redirect()->to(request()->header('referer'));
        } catch (\Exception $ex) {
            Log::error('Exception Error. Details: ' . $ex->getMessage() . ' in ' . $ex->getFile() . ' on line ' . $ex->getLine());

            notyf()->position('y', 'top')->error('An unexpected error occurred. Please try again later.');
            return redirect()->to(request()->header('referer'));
        }
    }
    public function render()
    {
        $categories = Category::orderBy('name')->where('user_id', Auth::id())->get();
        return view('livewire.man.add-product', ['categories' => $categories])->layout('layouts.base');
    }
}
