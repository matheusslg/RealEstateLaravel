<?php

use Illuminate\Http\Request;
use App\City;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cities', function() {
    return response(City::all(), 200)->header('Content-Type', 'application/json');
});

Route::get('cities/{uf}', function($uf) {
    return response(City::where('uf', $uf)->orderBy('nome', 'asc')->get(), 200)->header('Content-Type', 'application/json');
});
