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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/players/profile', 'PlayersController@profile')->name('profile');
Route::post('/players/profile', 'PlayersController@updateAvatar');

Route::resource('statistics', 'StatisticsController');
Route::resource('games', 'GamesController');
Route::resource('players', 'PlayersController');
Route::resource('news', 'NewsController');


//Route::post('/games', 'GamesController@store');