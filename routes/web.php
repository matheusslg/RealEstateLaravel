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

// Route::resource('user', 'UserController')->middleware('auth');
// Route::resource('category', 'CategoryController')->middleware('auth');
// Route::resource('city', 'CityController')->middleware('auth');
// Route::resource('modality', 'ModalityController')->middleware('auth');
// Route::resource('location', 'LocationController')->middleware('auth');
//Route::resource('property', 'PropertyController')->middleware('auth');

Route::post('home/begin',[
    'as' => 'home.begin',
    'uses' => 'HomeController@begin'
 ])->middleware('auth');

 Route::get('home/success',[
    'as' => 'home.success',
    'uses' => 'HomeController@success'
 ])->middleware('auth');

Route::get('property/trash',[
    'as' => 'property.trash',
    'uses' => 'PropertyController@trash'
 ])->middleware('auth');

 Route::post('property/restore/{id}',[
    'as' => 'property.restore',
    'uses' => 'PropertyController@restore'
 ])->middleware('auth');

 Route::post('property/delete/{id}',[
    'as' => 'property.delete',
    'uses' => 'PropertyController@delete'
 ])->middleware('auth');

Route::resources([
    'user' => 'UserController',
    'category' => 'CategoryController',
    'city' => 'CityController',
    'modality' => 'ModalityController',
    'location' => 'LocationController',
    'property' => 'PropertyController',
]);

// Route::resource('property', 'PropertyController')->except([
//     'index', 'show'
// ])->middleware('auth');
