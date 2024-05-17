<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);
                notyf()
                    ->position('x', 'right')
                    ->position('y', 'top')
                    ->success('Logged in successfully.');
                return redirect()->intended('dashboard');
            } else {
                notyf()
                    ->position('x', 'right')
                    ->position('y', 'top')
                    ->error('Email not connected to PointPro');
                return redirect()->intended('login');
            }
        } catch (Exception $e) {
            Log::error('Error: ', $e->getMessage());
        }
    }
}
