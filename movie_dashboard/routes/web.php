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

Route::get('/', 'DashboardController@index')->name('home');

Route::get('/movie', 'MovieController@index')->name('movie');

Route::get('/movie/streaming/{id}', 'MovieController@streaming')->name('movie-streaming');

Route::get('/facebook', 'MovieController@index')->name('facebook');

Route::get('/instagram', 'MovieController@index')->name('instagram');

Route::get('/twitter', 'MovieController@index')->name('twitter');

Route::get('/youtube', 'MovieController@index')->name('youtube');
