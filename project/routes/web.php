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

Route::get('/', 'WelcomeController@index')->name('welcome.index');


Route::post('/home/contact/send', 'ContactController@sendMessage')->name('contact.send');


Route::post('/home/reservation/send', 'ReservationController@sendMsg')->name('reservation.send');

Route::post('/home/reservation/{id}', 'ReservationController@status')->name('reservation.status');

//Route::delete('/home/reservation/{id}', 'ReservationController@destroy')->name('reservation.destroy');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/home/slider/create', 'SliderController@create')->name('slider.create');

//Route::post('/home/slider/store', 'SliderController@store')->name('slider.store'); 

//Route::post('/home/slider/update/{slider}', 'SliderController@update')->name('slider.update');

//Route::get('/home/slider', 'SliderController@index')->name('slider.index');
Route::resource('/home/slider', 'SliderController');

Route::resource('/home/category', 'CategoryController');

Route::resource('/home/item', 'ItemController');

Route::resource('/home/reservation', 'ReservationController');

Route::resource('/home/contact', 'ContactController');

