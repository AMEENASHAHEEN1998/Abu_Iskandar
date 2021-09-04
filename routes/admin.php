<?php

use App\Models\RequestJob;
use App\Models\Distributor;
use App\Models\DistributorType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\CarsController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\NoteController;
use App\Http\Controllers\admin\OfferController;
use App\Http\Controllers\admin\UserCoontroller;
use App\Http\Controllers\admin\StreetController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\ClassesController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RequestJobController;
use App\Http\Controllers\admin\DistributorController;
use App\Http\Controllers\admin\InformationController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\DriverRequestController;
use App\Http\Controllers\admin\NeighborhoodsController;
use App\Http\Controllers\admin\DistributorTypeController;
use App\Http\Controllers\admin\RoleController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
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

        Route::patch('driverrequest/update_status/{id}',[DriverRequestController::class,'update_status'])->name('driverrequest.update_status');

        Route::resource('offer', OfferController::class);
        Route::get('activeoffer',[OfferController::class,'activeoffer'])->name('activeoffer');
        Route::get('noactiveoffer',[OfferController::class,'noactiveoffer'])->name('noactiveoffer');

        Route::resource('article', ArticleController::class);
        Route::resource('information', InformationController::class);

        Route::resource('products', ProductController::class);
        Route::get('get_products/{id}' , [ ProductController::class, 'get_products'])->name('get_products');
        Route::resource('employee', EmployeeController::class);
        Route::resource('distributor', DistributorController::class);
        Route::resource('distributortype', DistributorTypeController::class);
        Route::resource('job', JobController::class);

        Route::get('activejob',[JobController::class,'activejob'])->name('job.activejob');
        Route::get('noactivejob',[JobController::class,'noactivejob'])->name('job.noactivejob');

        Route::resource('requestjob', RequestJobController::class);
        Route::get('activerequestjob',[RequestJobController::class,'activerequestjob'])->name('requestjob.activerequestjob');
        Route::get('noactiverequestjob',[RequestJobController::class,'noactiverequestjob'])->name('requestjob.noactiverequestjob');
        Route::get('waitrequestjobs',[RequestJobController::class,'waitrequestjobs'])->name('requestjob.waitrequestjobs');

        Route::get('createrequestjob/{id}', [RequestJobController::class,'createjob'])->name('requestjob.created');



        Route::resource('customers', CustomerController::class);
        Route::get('customers/find', [CustomerController::class,'find'])->name('customers.find');

        Route::get('get_neighborhood/{id}', [NeighborhoodsController::class , 'get_neighborhood']);

        Route::resource('car', CarsController::class);
        Route::resource('city', CityController::class);
        Route::resource('neighborhood', NeighborhoodsController::class);
        Route::resource('street', StreetController::class);

        Route::get('get_street/{id}', [StreetController::class , 'get_street']);


        Route::resource('classes', ClassesController::class);
        Route::resource('users', UserCoontroller::class);


        Route::resource('notes', NoteController::class);
        Route::get('sendtoaddnote/{id}', [NoteController::class , 'sendtoaddnote'])->name('sendtoaddnote');
        Route::get('addnoteview' , [NoteController::class , 'addnoteview'])->name('addnoteview');
        Route::patch('updatenote/{id}', [NoteController::class , 'updatenote'])->name('updatenote');
        Route::get('show_notes' , [NoteController::class , 'show_notes'])->name('show_notes');

        Route::get('driver_request/find', [DriverRequestController::class,'find'])->name('driverrequest.find');
        Route::get('driver_request/export/', [DriverRequestController::class,'export'])->name('export_request');
        Route::get('driver_request/export_wait_request/', [DriverRequestController::class,'export_wait_request'])->name('export_wait_request');


        Route::resource('role',RoleController::class );
        Route::resource('permission',PermissionController::class );

        Route::get('addrole',[HomeController::class ,'role']);

    });

        });




