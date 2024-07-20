<?php

namespace App\Livewire\Man;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Products extends Component
{
    public function delete($rowID)
    {
        try {
            $product = Product::findOrFail($rowID);
            $product->delete();
            notyf()->position('y', 'top')->success('Product deleted successfully');
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
        $products = Product::orderBy('name')->where('company_id', $company->id)->get();
        return view('livewire.man.products', ['products' => $products])->layout('layouts.base');
    }
}
