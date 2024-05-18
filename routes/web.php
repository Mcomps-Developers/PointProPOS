<?php

use App\Http\Controllers\GoogleController;
use App\Http\Middleware\AuthAdmin;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\AllClients;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Manage Redirect
Route::get('/dashboard', function () {
    $user = Auth::user();
    // Check if user is authenticated
    if ($user) {
        // Redirect based on user type (utype)
        switch ($user->utype) {
                // case 'byr':
                //     return redirect()->route('buyer.dashboard');
                //     break;
                // case 'slr':
                //     return redirect()->route('expert.dashboard');
                //     break;
            case 'adm':
                return redirect()->route('admin.dashboard');
                break;
                // case 'sadm':
                //     return redirect()->route('super.dashboard');
                //     break;
            default:
                abort(403);
                break;
        }
    } else {
        return redirect('/login');
    }
})->name('user.dashboard');


Route::middleware(['auth', 'verified', AuthAdmin::class])->group(function () {
    Route::get('/', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/clients',AllClients::class)->name('admin.clients');
});

// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
