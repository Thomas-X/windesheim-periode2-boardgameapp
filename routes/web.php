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
}
)->name('home');

// Redirect dead routes to new home (only works locally)
//if (array_key_exists('REQUEST_URI', $_SERVER)) {
//    if ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '') {
//        $uri = '';
//        header("Location: {$uri}");
//        die;
//    }
//}

    Auth::routes();

Route::get('/home', 'HomeController@index')->name('homeLoggedIn');

Route::get('/games', 'GamesController@index')->name('gamesIndex');
Route::get('/games/create', 'GamesController@create')->name('gamesCreate');
Route::post('/games/create', 'GamesController@store')->name('gamesStore');
Route::get('/games/{games}/edit', 'GamesController@edit')->name('gamesEdit');
Route::patch('/games/{games}/update', 'GamesController@update')->name('gamesUpdate');
Route::delete('/games/{games}/destroy', 'GamesController@destroy')->name('gamesDestroy');


Route::get('/scores', 'ScoresController@index')->name('scoresIndex');
Route::get('/scores/create', 'ScoresController@create')->name('scoresCreate');
Route::post('/scores/create', 'ScoresController@store')->name('scoresStore');

Route::get('/temp_user', 'TempUser@index')->name('tempUserIndex');
Route::post('/temp_user/create', 'TempUser@create')->name('tempUserCreate');

Route::get('/scores/overview', 'ScoresOverview@index')->name('scoresOverviewIndex');
