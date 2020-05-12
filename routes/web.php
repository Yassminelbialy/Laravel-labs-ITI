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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/phones/edit/{id}', 'PhoneController@edit');
Route::post('/phones/edit/{id}', 'PhoneController@update');
Route::get('/phones/delete/{id}', 'PhoneController@delete');
Route::post('/phones', 'PhoneController@store');
Route::delete('/phones/{id}', 'PhoneController@destroy');
Route::post('/user/address', 'AddressController@update');
Route::get('/users/add/{id}', 'UsersController@add');
Route::get('/users/destroy/{id}', 'UsersController@destroy');

