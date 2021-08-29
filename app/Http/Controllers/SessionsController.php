<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function userLogout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out successfully.');
    }
}