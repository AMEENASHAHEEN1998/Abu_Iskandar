<?php

use App\Http\Controllers\admin\ArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\OfferController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DistributorController;
use App\Http\Controllers\admin\DistributorTypeController;
use App\Http\Controllers\admin\InformationController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\DriverRequestController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\JobController;
use App\Models\Distributor;
use App\Models\DistributorType;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

        Route::resource('article', ArticleController::class);
        Route::resource('information', InformationController::class);

        Route::resource('products', ProductController::class);

        Route::resource('employee', EmployeeController::class);
        Route::resource('distributor', DistributorController::class);
        Route::resource('distributortype', DistributorTypeController::class);
        Route::resource('job', JobController::class);
        Route::get('activejob',[JobController::class,'activejob'])->name('job.activejob');
        Route::get('noactivejob',[JobController::class,'noactivejob'])->name('job.noactivejob');



        });
});
