<?php

namespace App\Livewire\Admin;

use App\Models\Industry;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Industries extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|unique:industries,industry',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function addIndustry()
    {
        $this->validate();

        try {
            $industry = new Industry();
            $industry->industry = $this->name; // Corrected the typo in property name
            $industry->save();
            $this->reset();

            notyf()->position('y', 'top')->success('Industry created');
        } catch (\Illuminate\Database\QueryException $ex) {
            // Log the database exception
            Log::error('Database error: ' . $ex->getMessage() . ' in ' . $ex->getFile() . ' on line ' . $ex->getLine());

            // Notify user about the error
            notyf()->position('y', 'top')->error('Database error occurred. Please try again later.');
        } catch (\Exception $ex) {
            // Log other exceptions
            Log::error('Error: ' . $ex->getMessage() . ' in ' . $ex->getFile() . ' on line ' . $ex->getLine());

            // Notify user about the error
            notyf()->position('y', 'top')->error('An unexpected error occurred. Please try again later.');
        }
    }
    public function render()
    {
        $collection = Industry::orderBy('industry')->get();
        return view('livewire.admin.industries', ['collection' => $collection])->layout('layouts.base');
    }
}
