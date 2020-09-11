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

Route::get('/hotels', 'HotelController@index')->middleware('admin');
Route::post('/hotels', 'HotelController@store')->middleware('admin');
Route::get('/hotels/create', 'HotelController@create')->middleware('admin');
Route::get('/hotels/{hotel}', 'HotelController@show')->middleware('admin');
Route::get('/hotels/{hotel}/edit', 'HotelController@edit')->middleware('admin');
Route::put('/hotels/{hotel}', 'HotelController@update')->middleware('admin');
Route::delete('/hotels/{hotel}', 'HotelController@destroy')->middleware('admin');

Route::get('/rooms', 'RoomController@index')->middleware('admin');
Route::post('/rooms', 'RoomController@store')->middleware('admin');
Route::get('/rooms/create', 'RoomController@create')->middleware('admin');
Route::get('/rooms/{room}', 'RoomController@show')->middleware('admin');
Route::get('/rooms/{room}/edit', 'RoomController@edit')->middleware('admin');
Route::put('/rooms/{room}', 'RoomController@update')->middleware('admin');
Route::delete('/rooms/{room}', 'RoomController@destroy')->middleware('admin');


Route::get('/reservations', 'ReservationController@index');
Route::get('/reservations/create', 'ReservationController@create');
Route::post('/reservations', 'ReservationController@store');
Route::get('/reservations/{reservation}', 'ReservationController@show');
Route::delete('/reservations/{reservation}', 'ReservationController@destroy');
