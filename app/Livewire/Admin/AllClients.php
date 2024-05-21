<?php

namespace App\Livewire\Admin;

use App\Models\Company;
use App\Models\Industry;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AllClients extends Component
{
    public $name;
    public $phone_number;
    public $email;

    public $business_name;
    public $business_phone_number;

    protected $rules = [
        'name' => 'required',
        'phone_number' => 'required|max_digits:12|min_digits:12|unique:users,phone_number',
        'email' => 'required|unique:users,email',
        'business_name' => 'required',
        'business_phone_number' => 'required|max_digits:12|min_digits:12',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function contactPerson()
    {
    }
    public function addIndustry()
    {
        $this->validate();

        try {
            $industry = new Company();
            $industry->industry = $this->name; // Corrected the typo in property name
            $industry->save();
            $this->reset();

            notyf()->position('y', 'top')->success('Industry created');
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
        $collection = Industry::orderBy('industry')->get();
        return view('livewire.admin.all-clients', ['collection' => $collection])->layout('layouts.base');
    }
}
