<?php

namespace App\Livewire\Man;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;

class Categories extends Component
{
    public $name;
    public $status;
    private $company_id;

    public function mount()
    {
        $this->company_id = Company::where('user_id', Auth::id())->first()->id;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:categories,name,NULL,id,company_id,' . $this->company_id,
            'status' => 'required',
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
            $category = new Category();
            $category->company_id = $company->id;
            $category->name = $this->name;
            $category->status = $this->status;
            $category->slug = Str::slug($this->name);
            $category->save();
            notyf()->position('y', 'top')->success('Category created successfully.');
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

    public function deleteItem($rowID)
    {
        try {
            $category = Category::findOrFail($rowID);
            $category->delete();
            notyf()->position('y', 'top')->success('Category deleted successfully');
            return redirect()->to(request()->header('referer'));
        } catch (\Illuminate\Database\QueryException $ex) {
            // Log the database exception
            Log::error('Database error: ' . $ex->getMessage() . ' in ' . $ex->getFile() . ' on line ' . $ex->getLine());

            // Notify user about the error
            notyf()->position('y', 'top')->error('Database error occurred. Please try again later.');
            return redirect()->to(request()->header('referer'));
        } catch (\Exception $ex) {
            // Log other exceptions
            Log::error('Error: ' . $ex->getMessage() . ' in ' . $ex->getFile() . ' on line ' . $ex->getLine());

            // Notify user about the error
            notyf()->position('y', 'top')->error('An unexpected error occurred. Please try again later.');
            return redirect()->to(request()->header('referer'));
        }
    }
    public function render()
    {
        $company = Company::where('user_id', Auth::id())->first();
        $categories = Category::orderBy('name')->where('company_id', $company->id)->get();
        return view('livewire.man.categories', ['categories' => $categories])->layout('layouts.base');
    }
}
