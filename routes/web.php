<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\BorrowingController;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/books', BookController::class);
Route::resource('/borrowings', BorrowingController::class);
// Route::resource('/borrowings', BorrowingViewsController::class);
Route::resource('/rayons', RayonController::class);
Route::resource('/rombels', RombelController::class);
Route::resource('/students', StudentController::class);
