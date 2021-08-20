<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News;

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

// NewsOnDemand Home
Route::get('/', [News::class, 'index']);

// NewsOnDemand Latest Articles
Route::get('/all', [News::class, 'all']);

// NewsOnDemand Categories
Route::get('/categories/{name}', [News::class, 'categories']);

// NewsOnDemand Publisher
// Route::get('/publisher/{name}', function () {
//     return view('publisher');
// });

// NewsOnDemand Single Article
Route::get('/article/{cat}/{slug}', [News::class, 'article']);
Route::get('/article/{cat}/{sub_cat}/{slug}', [News::class, 'article']);

// NewsOnDemand Terms & Conditions
Route::get('/terms-conditions', function () {
    return view('terms');
});

// NewsOnDemand Privacy Policy
Route::get('/privacy-policy', function () {
    return view('privacy');
});

// NewsOnDemand Sitemap
// Route::get('/sitemap.xml', function () {
//     return view('article');
// });
