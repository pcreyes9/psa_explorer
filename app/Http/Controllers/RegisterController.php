<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    // Handle registration
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username'     => 'required|string|max:255',
            'password' => 'required|min:8',
        ]);

        // dd('validated');

        $user = User::create([
            'username'     => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // dd($user);

        // Auto-login after registration
        Auth::login($user);

        return redirect('/')->with('success', 'Account created successfully!');
    }
}
