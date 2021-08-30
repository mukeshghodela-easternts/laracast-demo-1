<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

        // return back()->withErrors(['email' => 'Invalid Credentials']);

        throw ValidationException::withMessages([
            'email' => 'Invalid Credentials'
        ]);
    }

    public function userLogout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
