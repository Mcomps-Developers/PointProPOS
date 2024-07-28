<?php

namespace App\Livewire\Man;

use App\Models\Company;
use App\Models\User;
use App\Models\UserWallet;
use App\Notifications\NewCustomerNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Customers extends Component
{
    public $name;
    public $phone_number;
    public $email;
    public $userPassword;

    protected $rules = [
        'name' => 'required',
        'phone_number' => 'required|numeric|digits:12|unique:users,phone_number',
        'email' => 'required|unique:users,email',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    function generateRandomPassword($length = 4)
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
    public function create()
    {
        $this->validate();
        $this->userPassword = $this->generateRandomPassword();
        try {
            $company = Company::where('user_id', Auth::id())->first();
            $user = new User();
            $user->company_id = $company->id;
            $user->name = $this->name;
            $user->email = $this->email;
            $user->phone_number = $this->phone_number;
            $user->utype = 'cst';
            $user->password = Hash::make($this->userPassword);
            $user->save();

            $userWallet = new UserWallet();
            $userWallet->user_id = $user->id;
            $userWallet->save();
            $user->notify(new NewCustomerNotification($user, $company, $this->userPassword));
            notyf()->position('y', 'top')->success('Customer person created successfully!');
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
        $customers = User::where('company_id', $company->id)->where('utype', 'cst')->get();
        return view('livewire.man.customers', ['customers' => $customers])->layout('layouts.base');
    }
}
