<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\detailController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\authController;
use App\Http\Controllers\checkOutInsertTransactionController as checkOut;


Route::get('/', function (homeController $controller) {
    return $controller->home();
});

/*
- how i can be middleware for
- 1.goto RouteServiceProvider
- 2.goto Authenticate for auth
-
*/
Route::get("home-page", [homeController::class, 'home'])->name("home-page");
Route::middleware(['guest:web'])->group(function () {
    /*authController*/
    Route::get('login', [authController::class, 'pageLogin'])->name('login');
    Route::get('register', [authController::class, 'pageRegister'])->name('register');
});
/*after got home*/
Route::middleware(['auth:web'])->group(function () {
    Route::post("/logout", [homeController::class, 'logout'])->name("logout");
    Route::get("/product/{id}/detail/", [detailController::class, 'detailProduct'])->name("product-detail");
    /*cart*/
    Route::get('home-page/all-cards', [cartController::class, 'index'])->name("all-cards");
    Route::post('home-page/add-Card', [cartController::class, 'addToCart'])->name("add-card");
    Route::patch('/updateCard/{id}', [cartController::class, 'updateQty'])->name("update-Card");
    // checkout
    Route::post('checkout', [checkout::class, 'checkout'])->name('checkout');

    //user-profile
    Route::view('user-profile', 'user.user-profile')->name('user-profile');
});



// Route::get('/categories', function () {
//     return view('categories', [
//         'title' => 'Post Categories',
//         'active' => 'categories',
//         'categories' => Category::all()
//     ]);
// });
