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


Route::get('/~s1130146/P2_Laravel_Opdracht/', function () {

    return view('welcome');
}
)->name('home');

// Redirect dead routes to new home
if (array_key_exists('REQUEST_URI', $_SERVER)) {
    if ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '') {
        $uri = '/~s1130146/P2_Laravel_Opdracht';
        header("Location: {$uri}");
        die;
    }
}

Route::prefix('/~s1130146/P2_Laravel_Opdracht')->group(function () {
    Auth::routes();
});

Route::get('/~s1130146/P2_Laravel_Opdracht/home', 'HomeController@index')->name('homeLoggedIn');

Route::get('/~s1130146/P2_Laravel_Opdracht/games', 'GamesController@index')->name('gamesIndex');
Route::get('/~s1130146/P2_Laravel_Opdracht/games/create', 'GamesController@create')->name('gamesCreate');
Route::post('/~s1130146/P2_Laravel_Opdracht/games/create', 'GamesController@store')->name('gamesStore');
Route::get('/~s1130146/P2_Laravel_Opdracht/games/{games}/edit', 'GamesController@edit')->name('gamesEdit');
Route::patch('/~s1130146/P2_Laravel_Opdracht/games/{games}/update', 'GamesController@update')->name('gamesUpdate');
Route::delete('/~s1130146/P2_Laravel_Opdracht/games/{games}/destroy', 'GamesController@destroy')->name('gamesDestroy');


Route::get('/~s1130146/P2_Laravel_Opdracht/scores', 'ScoresController@index')->name('scoresIndex');
Route::get('/~s1130146/P2_Laravel_Opdracht/scores/create', 'ScoresController@create')->name('scoresCreate');
Route::post('/~s1130146/P2_Laravel_Opdracht/scores/create', 'ScoresController@store')->name('scoresStore');

Route::get('/~s1130146/P2_Laravel_Opdracht/temp_user', 'TempUser@index')->name('tempUserIndex');
Route::post('/~s1130146/P2_Laravel_Opdracht/temp_user/create', 'TempUser@create')->name('tempUserCreate');

Route::get('/~s1130146/P2_Laravel_Opdracht/scores/overview', 'ScoresOverview@index')->name('scoresOverviewIndex');
