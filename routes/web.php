<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Livewire\Membership\MemAcc;


Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

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


    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});
