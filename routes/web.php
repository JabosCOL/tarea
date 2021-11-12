<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/home', [PostController::class, 'index'])->name('index');

Route::group( ['middleware'=>'auth'],function () {
    Route::get('/', [PostController::class, 'index'])->name('home');
});

Route::resource('profile', ProfileController::class)->names('profile');

Route::resource('post', PostController::class)->names('post');

Route::resource('comment', CommentController::class)->names('comment');

Route::get('/artisan/storage', function() {
    $command = 'storage:link';
    $result = Artisan::call($command);
    return Artisan::output();
});