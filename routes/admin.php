<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name("admin.")->group(function () {

    Route::middleware(["guest:admin"])->group(function () {
        Route::view('login', 'admin/pages/auth/login')->name("login");
    });
    Route::middleware(["auth:admin"])->group(function () {
        Route::view('home-admin', 'admin.pages.admin-dashboard')->name("home-admin");
        Route::view('profile-admin', 'admin.pages.profile-admin')->name("profile-admin");
        Route::view('list-table', 'admin.pages.list-table')->name('list-table');
    });
});
