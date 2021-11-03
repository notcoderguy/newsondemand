<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
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

// Route::get('/', function () {
//     return view('app');
// });

Route::redirect('/', 'm/');

Route::prefix('m')->group(function () {
    // NewsOnDemand Home/Latest Articles
    Route::get('/', [NewsController::class, 'app']);
    
    // NewsOnDemand Categories
    Route::get('/categories', [NewsController::class, 'categories']);
    Route::get('/categories/{cat}', [NewsController::class, 'categories']);
    
    // NewsOnDemand Single Article
    Route::get('/article/{hashed}', [NewsController::class, 'article']);
    
    // NewsOnDemand Single Article
    Route::get('/search', [NewsController::class, 'search']);
    
    // NewsOnDemand About
    Route::get('/about-us', function () {
        return view('mobile.pages.about-us') -> with(['year' => date("Y")]);
    });
});

Route::get('/privacy-policy', function () {
    return view('pages.privacy');
});

Route::get('/terms-and-conditions', function () {
    return view('pages.terms');
});