<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/relacion', 'App\Http\Controllers\RelacionController@index');
Route::get('/', 'App\Http\Controllers\RelacionController@index');


Route::put('/relacionesput', 'App\Http\Controllers\RelacionController@update');

Route::get('/porlibro', 'App\Http\Controllers\RelacionController@porlibro');


Route::get('/porlibros', 'App\Http\Controllers\RelacionController@porlibros');
Route::get('/porlibroscreados', 'App\Http\Controllers\RelacionController@porlibroscreados');
Route::post('/calificar', 'App\Http\Controllers\RelacionController@create');
Route::post('/createbook', 'App\Http\Controllers\RelacionController@createbook');