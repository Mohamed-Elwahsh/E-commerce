<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
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
    // return view('front.home');
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware('guest:web', 'PreventBackHistory')->group(function(){
        Route::get('/login', [UserController::class,'login'])->name('login');
        Route::get('/register', [UserController::class,'register'])->name('register');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');
    });
    Route::middleware('auth:web', 'PreventBackHistory')->group(function(){
        Route::get('/home', [UserController::class,'home'])->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });
});
