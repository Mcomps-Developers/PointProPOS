<?php

namespace App\Livewire\Admin;

use App\Models\Company;
use App\Models\Industry;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;

class AllClients extends Component
{
    public $name;
    public $phone_number;
    public $email;

    public $business_name;
    public $business_phone_number;
    public $kra_pin_number;
    public $industry;
    public $address;
    private $userPassword;
    private $reference;

    protected $rules = [
        'name' => 'required',
        'phone_number' => 'required|numeric|max_digits:12|min_digits:12|unique:users,phone_number',
        'email' => 'required|unique:users,email',
        'business_name' => 'required',
        'business_phone_number' => 'required|max_digits:12|min_digits:12',
        'kra_pin_number' => 'required|string|size:11',
        'industry' => 'required',
        'address' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    function generateRandomPassword($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';

        $maxIndex = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, $maxIndex);
            $password .= $characters[$randomIndex];
        }

        return $password;
    }
    private function generateReference()
    {
        do {
            $this->reference = Str::random(5);
        } while (Company::where('reference', $this->reference)->exists());
    }
    public function newClient()
    {
        $this->validate();
        $this->userPassword = $this->generateRandomPassword();
        $this->generateReference();
        try {
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->phone_number = $this->phone_number;
            $user->utype = 'man';
            $user->email_verified_at = Carbon::now()->setTimezone('Africa/Nairobi');
            $user->password = Hash::make($this->userPassword);
            $user->save();
            notyf()->position('y', 'top')->success('Contact person created');
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

        try {
            $company = new Company();
            $company->name = $this->business_name;
            $company->tax_number = $this->kra_pin_number;
            $company->phone = $this->business_phone_number;
            $company->address = $this->address;
            $company->industry_id = $this->industry;
            $company->user_id = $user->id;
            $company->reference = $this->reference;
            $company->save();
            $this->reset();

            notyf()->position('y', 'top')->success('Client created');
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