<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'landingPage'])->name('landing_page');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/favourites', [FrontendController::class, 'getFavourites'])->name('favourites');
    Route::get('/favourite/{id}', [FavouriteController::class, 'store'])->name('add_to_favourite');
    Route::get('/remove-favourite/{id}', [FavouriteController::class, 'destroy'])->name('remove_from_favourite');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::get('/', [AdminController::class, 'viewDashboard'])->middleware(['auth', 'is_admin'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'viewProfile'])->middleware(['auth', 'is_admin'])->name('admin.profile');

    Route::resource('movies', MovieController::class);

    Route::get('/users', [UserController::class, 'index'])->name('users');
});
