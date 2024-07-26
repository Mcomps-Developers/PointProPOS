<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Repayment;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthCst;
use App\Http\Middleware\AuthManager;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\AllClients;
use App\Livewire\Admin\Industries;
use App\Livewire\Cst\CstDashboard;
use App\Livewire\Cst\CstNotifications;
use App\Livewire\Man\AddProduct;
use App\Livewire\Man\Categories;
use App\Livewire\Man\Customers;
use App\Livewire\Man\EditCompanyDetails;
use App\Livewire\Man\InvoiceDetails;
use App\Livewire\Man\Invoices;
use App\Livewire\Man\ManagerDashboard;
use App\Livewire\Man\Products;
use App\Livewire\User\MyProfile;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// If Logged Out
Route::get('/', function () {
    return redirect('/dashboard');
});

// Manage Redirect
Route::get('/dashboard', function () {
    $user = Auth::user();
    // Check if user is authenticated
    if ($user) {
        // Redirect based on user type (utype)
        switch ($user->utype) {
            case 'man':
                return redirect()->route('manager.dashboard');
                break;
            case 'adm':
                return redirect()->route('admin.dashboard');
                break;
            case 'cst':
                return redirect()->route('cst.dashboard');
                break;
            default:
                abort(403);
                break;
        }
    } else {
        return redirect('/login');
    }
})->name('user.dashboard');

// Customer
Route::prefix('/account')->middleware(['auth', 'verified', AuthCst::class])->group(function () {
    Route::get('/dashboard', CstDashboard::class)->name('cst.dashboard');
    Route::get('/notifications',CstNotifications::class)->name('cst.notifications');
});


// Admin
Route::prefix('/admin')->middleware(['auth', 'verified', AuthAdmin::class])->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/clients', AllClients::class)->name('admin.clients');
    Route::get('/industries', Industries::class)->name('admin.industries');
});


// Client
Route::prefix('/manager')->middleware(['auth', 'verified', AuthManager::class])->group(function () {
    Route::get('/dashboard', ManagerDashboard::class)->name('manager.dashboard');
    Route::get('/company-details', EditCompanyDetails::class)->name('company.settings');
    // Category
    Route::prefix('category')->group(function () {
        Route::get('/view', Categories::class)->name('categories');
    });

    // Products
    Route::prefix('products')->group(function () {
        Route::get('/view', Products::class)->name('products');
        Route::get('/add', AddProduct::class)->name('product.add');
    });

    // Customers
    Route::get('/customers', Customers::class)->name('customers');

    // Invoices
    Route::get('/invoices', Invoices::class)->name('invoices');
    Route::get('invoice/{reference}/details', InvoiceDetails::class)->name('invoice.details');
});

// User Routes
Route::prefix('/my')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', MyProfile::class)->name('user.profile');
});

// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session')])->group(function () {
    Route::post('/repayment/callback', [Repayment::class, 'saveTransaction'])->name('save.transaction');
});
