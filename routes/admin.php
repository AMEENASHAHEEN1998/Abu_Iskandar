<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DriverRequestController;
use App\Http\Controllers\admin\OfferController;
use App\Http\Controllers\admin\SubCategoryController;
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
        Route::resource('subcategories', SubCategoryController::class);
        Route::resource('driverrequest',DriverRequestController::class);
        Route::get('orderwait',[DriverRequestController::class,'orderwait'])->name('orderwait');
        Route::get('orderdeliver',[DriverRequestController::class,'orderdeliver'])->name('orderdeliver');

        Route::resource('offer', OfferController::class);
        Route::get('activeoffer',[OfferController::class,'activeoffer'])->name('activeoffer');
        Route::get('noactiveoffer',[OfferController::class,'noactiveoffer'])->name('noactiveoffer');


        });
});
