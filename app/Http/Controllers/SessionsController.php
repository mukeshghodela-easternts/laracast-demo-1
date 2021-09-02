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

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Invalid Credentials'
            ]);
        }

        // return back()->withErrors(['email' => 'Invalid Credentials']);

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function userLogout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
