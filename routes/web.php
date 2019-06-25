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

Route::get('/', 'WebController@index');

Route::get('/saludar/{name}', 'WebController@sayHello');

// Route::get('/movies', 'MoviesController');

Route::get('/admin', function () {
	return view('back.index');
});

Route::get('/movies/detail/{id}', 'MoviesController@searchById');
Route::get('/movies/find/{name}', 'MoviesController@findMovieByName');
