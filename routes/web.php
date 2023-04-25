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

Route::view('/', 'startseite');

Route::view('/kontakt', 'kontakt');

Route::view('/impressum', 'impressum');

Route::view('/datenschutz', 'datenschutz');

Route::get('/reservierung/heute', 'BookingController@getToday');
Route::get('/reservierung/morgen', 'BookingController@getTomorrow');
Route::post('/reservierung/heute', 'BookingController@postToday');
Route::post('/reservierung/morgen', 'BookingController@postTomorrow');
Route::get('/reservierung/erfolg', 'BookingController@getErfolg');