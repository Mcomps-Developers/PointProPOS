<?php

namespace App\Livewire\Man;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditCompanyDetails extends Component
{
    public $name;
    public $email;
    public $address;
    public $phone;

    public function mount()
    {
        $company = Company::where('user_id', Auth::id())->first();
        $this->name = $company->name;
        $this->email = $company->email;
        $this->address = $company->address;
        $this->phone = $company->phone;
    }
    public function render()
    {
        return view('livewire.man.edit-company-details')->layout('layouts.base');
    }
}
