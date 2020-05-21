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

// Location routes
Route::prefix('/locations')->name('locations.')->group(function () {
    Route::get('/search', 'Location\ListController@search')
        ->name('search');
    Route::get('/', 'Location\ListController@show')
        ->name('list');
    Route::get('/detail/{id}', 'Location\DetailController@show')
        ->name('detail');
    Route::get('/detail/{id}/delete', 'Location\DetailController@delete')
        ->middleware('password.confirm')
        ->name('delete');
    Route::get('/create', 'Location\CreateController@showCreationForm')
        ->middleware('auth')
        ->name('create');
    Route::post('/create', 'Location\CreateController@store')
        ->middleware('auth')
        ->name('store');
});

// Profile routes
Route::prefix('/users')->name('users.')->group(function () {
    Route::get('/detail/{id}', 'ProfileController@show')
        ->name('detail');
});
