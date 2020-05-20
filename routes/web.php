<?php
declare(strict_types=1);

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
Route::view('/imprint', 'imprint');

// Location routes
Route::get('/location/{id}', 'Location\DetailController@show');
Route::get('/locations', 'Location\ListController@show');
Route::get('/create', 'Location\CreateController@showCreationForm')->name('create');
Route::post('/create', 'Location\CreateController@store');

// Profile routes
Route::get('/profile/{id}', 'ProfileController@show')->name('profile');
