<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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


Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [ProfileController::class, 'index'])->name('index');

Route::group( ['middleware'=>'auth'],function () {
    Route::get('/', [ProfileController::class, 'index'])->name('home');
});
Route::resource('profile', ProfileController::class)->names('profile');
