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

Route::get('/locations/create_1', 'LocationController@create_1')->name('locations.create_1');
Route::post('/locations/create_2', 'LocationController@create_2')->name('locations.create_2');
Route::post('/locations/create_3', 'LocationController@create_3')->name('locations.create_3');

Route::resource('locations', 'LocationController')
    ->except(['create']);

Route::get('/locations/{location}/slots/create', 'SlotController@create')->name('slots.create');
Route::post('/locations/{location}/slots/create', 'SlotController@store')->name('slots.store');
Route::delete('/locations/{location}/slots/{slot}')->name('slots.destroy');

Route::get('/locations/{location}/slots/{slot}/bookings/create', 'BookingController@create')->name('bookings.create');
Route::post('/locations/{location}/slots/{slot}/bookings/create', 'BookingController@store')->name('bookings.store');
Route::delete('/locations/{location}/slots/{slot}/bookings/{booking}', 'BookingController@destroy')->name('bookings.destroy');

// Profile routes
Route::resource('users', 'UserController')
    ->only(['show', 'index', 'destroy']);

//categories
Route::get('/categories', 'CategoryController@index');

// Sitemap
Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap.xml/locations', 'SitemapController@locations');
Route::get('/sitemap.xml/users', 'SitemapController@users');
