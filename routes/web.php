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


Route::get('/rooms', 'RoomController@index');
Route::post('/rooms', 'RoomController@store');
Route::get('/rooms/create', 'RoomController@create');
Route::get('/rooms/{room}', 'RoomController@show');
Route::get('/rooms/{room}/edit', 'RoomController@edit');
Route::put('/rooms/{room}', 'RoomController@update');