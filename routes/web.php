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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/games', 'GamesController@index');
Route::get('/games/create', 'GamesController@create');
Route::post('/games/create', 'GamesController@store');
Route::get('/games/{games}/edit', 'GamesController@edit');
Route::patch('/games/{games}/update', 'GamesController@update');
Route::delete('/games/{games}/destroy', 'GamesController@destroy');


Route::get('/scores', 'ScoresController@index');
