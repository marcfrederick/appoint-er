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
Route::get('/', 'IndexController@show')->name('home');
Route::view('/imprint', 'imprint')->name('imprint');
Route::view('/privacy', 'privacy')->name('privacy-policy');

// locations
Route::prefix('locations')->name('locations.')->group(function () {
    Route::get('search', 'LocationController@search')->name('search');
    Route::get('create_1', 'LocationController@create_1')->name('create_1');
    Route::get('create_2', 'LocationController@create_2')->name('create_2');
    Route::get('create_3', 'LocationController@create_3')->name('create_3');
});
Route::resource('locations', 'LocationController')->except(['create']);

Route::prefix('locations/{location}/slots')->name('slots.')->group(function () {
    Route::get('create', 'SlotController@create')->name('create');
    Route::post('create', 'SlotController@store')->name('store');
    Route::delete('{slot}', 'SlotController@destroy')->name('destroy');

});
Route::prefix('locations/{location}/slots/{slot}/bookings')->name('bookings.')->group(function () {
    Route::get('create', 'BookingController@create')->name('create');
    Route::post('create', 'BookingController@store')->name('store');
    Route::delete('{booking}', 'BookingController@destroy')->name('destroy');
});

// Profile routes
Route::resource('users', 'UserController')
    ->only(['show', 'index', 'destroy']);

//categories
Route::get('/categories', 'CategoryController@index');

// Sitemap
Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap.xml/locations', 'SitemapController@locations');
Route::get('/sitemap.xml/users', 'SitemapController@users');
