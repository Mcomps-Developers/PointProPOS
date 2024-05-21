<?php

namespace App\Livewire\Admin;

use App\Models\Company;
use Carbon\Carbon;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        $collection = Company::orderByDesc('created_at')->limit(10)->get();
        $countClients = Company::count();
        $activeClients = Company::where('renewal_date', '>=', Carbon::now())->count();
        return view('livewire.admin.admin-dashboard', ['collection' => $collection, 'countClients' => $countClients,'activeClients'=>$activeClients])->layout('layouts.base');
    }
}
