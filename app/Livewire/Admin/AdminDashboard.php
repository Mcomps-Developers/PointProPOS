<?php

namespace App\Livewire\Admin;

use App\Models\Company;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        $collection = Company::orderByDesc('created_at')->limit(10)->get();
        return view('livewire.admin.admin-dashboard', ['collection' => $collection])->layout('layouts.base');
    }
}
