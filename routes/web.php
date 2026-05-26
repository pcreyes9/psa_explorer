<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Livewire\Membership\MemAccount;

use Illuminate\Support\Facades\DB;

Route::get('/db-check', function () {
    try {
        DB::connection()->getPdo();
        return "Database connected successfully ✅";
    } catch (\Exception $e) {
        return "DB connection failed ❌: " . $e->getMessage();
    }
});

Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

   

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


    Route::post('/login', LoginController::class)->name('login.attempt');

});


Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    // Membership Account
    Route::get('/membership-search', function () {
        return view('membership.search');
    })->name('mem-search');

    Route::get('/membership-account-{member}', action: function(string $member) {
    return view('membership.account', [
        'memberId' => $member,
    ]);})->name('mem-account');

    Route::get('/member/photo/{memberId}', [MemAccount::class, 'showImg'])
    ->name('member.photo');

    // Reports
    Route::get('/reports-cme', function () {
        return view('reports.cme');
    })->name('reports-cme');

    // Payments
    Route::get('/browse-payments', function () {
        return view('payments.browse');
    })->name('payments-browse');



    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});
