<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController')->middleware('auth');
Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('city', 'CityController')->middleware('auth');
Route::resource('modality', 'ModalityController')->middleware('auth');
Route::resource('property', 'PropertyController')->middleware('auth');