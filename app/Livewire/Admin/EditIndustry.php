<?php

namespace App\Livewire\Admin;

use App\Models\Industry;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditIndustry extends Component
{
    public $rowID;
    public $name;

    public function mount($rowID)
    {
        $this->rowID = $rowID;
        $industry = Industry::findOrFail($this->rowID);
        $this->name = $industry->industry;
    }
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
            $industry = Industry::findOrFail($this->rowID);
            $industry->industry = $this->name;
            $industry->save();
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
        return view('livewire.admin.edit-industry');
    }
}
