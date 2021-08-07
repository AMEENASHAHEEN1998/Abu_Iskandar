<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;


use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\HomeController;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/' , [HomeController::class , 'index'])->name('dashboard');

        Auth::routes();
        Auth::routes(['register' => false]);


        Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard' , [DashboardController::class , 'index'])->name('dashboard');
        Route::resource('categories', CategoryController::class);

        });
});
