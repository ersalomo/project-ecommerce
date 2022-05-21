<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class authController extends Controller
{
    // Route::view('login', 'auth/login')->name("login");
    // Route::view('register', 'auth.register')->name("register");

    public function pageLogin()
    {
        return view('auth/login');
    }

    public function pageRegister()
    {
        return view('auth.register');
    }
}
