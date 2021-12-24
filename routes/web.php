<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MobileNewsController;

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

Route::domain('www.newsondemand.in') -> group(function () {

    // NewsOnDemand Home Page
    Route::get('/', [NewsController::class, 'app'])->name('app');

    // NewsOnDemand Categories
    Route::get('/categories/{category}', [NewsController::class, 'categories'])->name('categories');
    
    // NewsOnDemand Single Article
    Route::get('/article/{hashed}/{title}', [NewsController::class, 'article']);
    
    // NewsOnDemand Single Article
    Route::get('/search', [NewsController::class, 'search']);
    
    // NewsOnDemand About
    Route::get('/about-us', function () {
        return view('about');
    })->name('about');
    
    Route::prefix('m')->group(function () {
        // NewsOnDemand Home/Latest Articles
        Route::get('/', [MobileNewsController::class, 'app'])->name('mobile.app');
        
        // NewsOnDemand Categories
        Route::get('/categories', [MobileNewsController::class, 'categories']);
        Route::get('/categories/{cat}', [MobileNewsController::class, 'categories']);
        
        // NewsOnDemand Single Article
        Route::get('/article/{hashed}', [MobileNewsController::class, 'article']);
        
        // NewsOnDemand Single Article
        Route::get('/search', [MobileNewsController::class, 'search']);
        
        // NewsOnDemand About
        Route::get('/about-us', function () {
            return view('mobile.pages.about-us') -> with(['year' => date("Y")]);
        });
    });

});