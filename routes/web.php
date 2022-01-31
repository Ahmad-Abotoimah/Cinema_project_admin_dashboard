<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;

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
// Route::resource('admin', AdminController::class);

//User Route
Route::get("add_user", [UserController::class, 'create']);
Route::post("add_user/store", [UserController::class, 'store'])->name('user.store');
Route::get("/user", [UserController::class, 'index'])->name('user.index');
Route::get("user/edit/{id}", [UserController::class, 'edit'])->name('user.edit');
Route::post("user/update/{id}", [UserController::class, 'update'])->name('user.update');
Route::get("user/destroy/{id}", [UserController::class, 'destroy'])->name('user.destroy');

//Admin Route
Route::get("add_admin", [AdminController::class, 'create']);
Route::post("add_admin/store", [AdminController::class, 'store'])->name('admin.store');
Route::get("/admin", [AdminController::class, 'index'])->name('admin.index');
Route::get("admin/edit/{id}", [AdminController::class, 'edit'])->name('admin.edit');
Route::post("admin/update/{id}", [AdminController::class, 'update'])->name('admin.update');
Route::get("admin/destroy/{id}", [AdminController::class, 'destroy'])->name('admin.destroy');

//Category Route

Route::get("add_category", [CategoryController::class, 'create']);
Route::post("add_category/store", [CategoryController::class, 'store'])->name('category.store');
Route::get("/category", [CategoryController::class, 'index'])->name('category.index');
Route::get("category/edit/{id}", [CategoryController::class, 'edit'])->name('category.edit');
Route::post("category/update/{id}", [CategoryController::class, 'update'])->name('category.update');
Route::get("category/destroy/{id}", [CategoryController::class, 'destroy'])->name('category.destroy');

//Movie Route

Route::get("add_movie", [MovieController::class, 'create']);
Route::post("add_movie/store", [MovieController::class, 'store'])->name('movie.store');
Route::get("/movie", [MovieController::class, 'index'])->name('movie.index');
Route::get("movie/edit/{id}", [MovieController::class, 'edit'])->name('movie.edit');
Route::post("movie/update/{id}", [MovieController::class, 'update'])->name('movie.update');
Route::get("movie/destroy/{id}", [MovieController::class, 'destroy'])->name('movie.destroy');

//Booking Route

Route::get("add_booking", [BookingController::class, 'create']);
Route::post("add_booking/store", [BookingController::class, 'store'])->name('booking.store');
Route::get("/booking", [BookingController::class, 'index'])->name('booking.index');
Route::get("booking/edit/{id}", [BookingController::class, 'edit'])->name('booking.edit');
Route::post("booking/update/{id}", [BookingController::class, 'update'])->name('booking.update');
Route::get("booking/destroy/{id}", [BookingController::class, 'destroy'])->name('booking.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
