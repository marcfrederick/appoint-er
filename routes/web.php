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
Route::view('/imprint', 'imprint')->name('imprint');

// locations
Route::get('/locations/search', 'LocationController@search')
    ->name('locations.search');
Route::resource('locations', 'LocationController')
    ->except(['update', 'edit']);

// Profile routes
Route::prefix('/users')->name('users.')->group(function () {
    Route::get('/detail/{id}', 'ProfileController@show')
        ->name('detail');
});
