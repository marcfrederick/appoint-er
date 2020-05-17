<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/imprint', 'imprint');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('location/{id}', 'LocationController@single');

Route::get('locations', 'LocationController@all');

Route::get('user/{id}', 'ProfileController@show');
