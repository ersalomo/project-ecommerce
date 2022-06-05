<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::prefix('admin')->name("admin")->group(function () {

    Route::middleware(["guest:web"])->group(function () {
        Route::view('/login', 'admin/pages/auth/login')->name("/login");
    });
    Route::middleware(["auth:web"])->group(function () {
        Route::view('/home-admin', 'admin.pages.admin-dashboard')->name("/home-admin");
    });
});
