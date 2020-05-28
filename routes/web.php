<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Auth routes
Auth::routes();

// Misc routes
Route::get('/', 'IndexController@show');
Route::view('/imprint', 'imprint')->name('imprint');
Route::view('/privacy', 'privacy')->name('privacy-policy');

// locations
Route::get('/locations/search', 'LocationController@search')
    ->name('locations.search');
Route::resource('locations', 'LocationController');

// Profile routes
Route::resource('users', 'UserController')
    ->only(['show', 'index', 'destroy']);

//categories
Route::get('/categories','CategoryController@index');

// Sitemap
Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap.xml/locations', 'SitemapController@locations');
Route::get('/sitemap.xml/users', 'SitemapController@users');
