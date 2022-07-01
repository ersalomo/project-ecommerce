<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\detailController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\authController;
use App\Http\Controllers\checkOutInsertTransactionController as checkOut;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
- how i can be middleware for
- 1.goto RouteServiceProvider
- 2.goto Authenticate for auth
-
*/


/*before get home*/
Route::middleware(['guest:web'])->group(function () {
    /*authController*/
    Route::get('login', [authController::class, 'pageLogin'])->name('login');
    Route::get('register', [authController::class, 'pageRegister'])->name('register');
});

Route::get("home-page/", [homeController::class, 'home'])->name("home-page");

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

// I'm just thinking better of
Route::prefix('/')->name("")->group(function () {
    // middleware of guest puts over here


    // middleware of auth puts over here
});


// Route::get('/categories', function () {
//     return view('categories', [
//         'title' => 'Post Categories',
//         'active' => 'categories',
//         'categories' => Category::all()
//     ]);
// });
