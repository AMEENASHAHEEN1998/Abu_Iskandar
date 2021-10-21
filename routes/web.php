<?php

use App\Http\Controllers\front\AbuEskandarController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/' , [AbuEskandarController::class , 'index'])->name('home');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/' , [AbuEskandarController::class , 'index'])->name('home');

        Auth::routes();
        // // Auth::routes(['register' => false]);

        Route::prefix('AbuEskandar')->name('AbuEskandar.')->group(function(){
            Route::get('/',[AbuEskandarController::class ,'index'])->name('home');
            Route::get('about',[AbuEskandarController::class ,'about'])->name('about');
            Route::get('offer',[AbuEskandarController::class ,'offer'])->name('offer');
            Route::get('contact',[AbuEskandarController::class ,'contact'])->name('contact');
            Route::get('category/{category:category_name_en}' , [AbuEskandarController::class , 'show_category'])->name('show_category');
            Route::get('Employment_applications',[AbuEskandarController::class ,'Employment_applications'])->name('Employment_applications');
            Route::get('requestjob/{id}',[AbuEskandarController::class ,'requestjob'])->name('requestjob')->middleware('auth');
            Route::get('articles',[AbuEskandarController::class ,'articles'])->name('articles');
            Route::get('article/{id}',[AbuEskandarController::class ,'article'])->name('article');
            // Route::get('articleupdate/{id}',[AbuEskandarController::class ,'articleupdate'])->name('articleupdate');
            Route::get('distributor',[AbuEskandarController::class ,'distributor'])->name('distributor');


            Route::put('update_product_view/{id}', [AbuEskandarController::class , 'update_product_view'])->name('update_product_view');

            Route::post('mail',[AbuEskandarController::class ,'mail'])->name('mail');

        });

});


