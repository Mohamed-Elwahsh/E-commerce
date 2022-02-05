<?php
use Modules\AdminModule\Http\Controllers\Admin\AdminController;
use Modules\CategoriesModule\Http\Controllers\Languages\LanguagesController;
use Modules\CategoriesModule\Http\Controllers\Categories\MainCategoriesController;

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
define('PAGINATION', 10);

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('guest:admin', 'PreventBackHistory')->group(function(){
        Route::get('/', [AdminController::class,'login'])->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });
    Route::middleware('auth:admin', 'PreventBackHistory')->group(function(){
        Route::get('/home', [AdminController::class,'home'])->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });
});
Route::prefix('languages')
     ->name('languages.')
     ->middleware('auth:admin')
     ->group(function(){
        Route::get('/', [LanguagesController::class,'index'])->name('all');
        Route::get('/create', [LanguagesController::class,'create'])->name('create');
        Route::post('/store', [LanguagesController::class,'store'])->name('store');
        Route::get('/edit/{id}', [LanguagesController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [LanguagesController::class,'update'])->name('update');
        Route::get('/delete/{id}', [LanguagesController::class,'destroy'])->name('delete');
});
Route::prefix('maincategories')
     ->name('maincategories.')
     ->middleware('auth:admin')
     ->group(function(){
        Route::get('/', [MainCategoriesController::class,'index'])->name('all');
        Route::get('/create', [MainCategoriesController::class,'create'])->name('create');
        Route::post('/store', [MainCategoriesController::class,'store'])->name('store');
        Route::get('/edit/{id}', [MainCategoriesController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [MainCategoriesController::class,'update'])->name('update');
        Route::get('/delete/{id}', [MainCategoriesController::class,'destroy'])->name('delete');
});

 Route::get('tests', function(){
     dd( get_languages() );
 });