<?php

use App\Http\Controllers\GoogleController;
use App\Livewire\Admin\AdminDashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Manage Redirect
// Route::get('/dashboard', function () {
//     $user = Auth::user();
//     // Check if user is authenticated
//     if ($user) {
//         // Redirect based on user type (utype)
//         switch ($user->utype) {
//             case 'csr':
//                 return redirect()->route('cashier.dashboard');
//                 break;
//             case 'vnd':
//                 return redirect()->route('vendor.dashboard');
//                 break;
//             case 'man':
//                 return redirect()->route('man.dashboard');
//                 break;
//             case 'adm':
//                 return redirect()->route('admin.dashboard');
//                 break;
//             default:
//                 abort(403);
//                 break;
//         }
//     } else {
//         return redirect('/login');
//     }
// })->name('user.dashboard');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', AdminDashboard::class)->name('admin.dashboard');
});



Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
