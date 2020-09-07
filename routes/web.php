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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/hotels', 'HotelController@index');
Route::post('/hotels', 'HotelController@store');
Route::get('/hotels/create', 'HotelController@create');
Route::get('/hotels/{hotel}', 'HotelController@show');
Route::get('/hotels/{hotel}/edit', 'HotelController@edit');
Route::put('/hotels/{hotel}', 'HotelController@update');
Route::delete('/hotels/{hotel}', 'HotelController@destroy');

Route::get('/rooms', 'RoomController@index');
Route::post('/rooms', 'RoomController@store');
Route::get('/rooms/create', 'RoomController@create');
Route::get('/rooms/{room}', 'RoomController@show');
Route::get('/rooms/{room}/edit', 'RoomController@edit');
Route::put('/rooms/{room}', 'RoomController@update');
Route::delete('/rooms/{room}', 'RoomController@destroy');


Route::get('/reservations', 'ReservationController@index');
Route::get('/reservations/create', 'ReservationController@create');
Route::post('/reservations', 'ReservationController@store');
Route::get('/reservations/{reservation}', 'ReservationController@show');
Route::delete('/reservations/{reservation}', 'ReservationController@destroy');
