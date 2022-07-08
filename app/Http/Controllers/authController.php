<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class authController extends Controller
{

    public function pageLogin()
    {
        return view('auth/login');
    }
    public function pageRegister()
    {
        return view('auth.register');
    }
}
