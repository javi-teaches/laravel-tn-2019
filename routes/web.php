<?php

use App\Movie;
use App\Actor;

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

// Route::resource('/movies', 'MoviesController');

Route::get('/admin', function () {
	return view('back.index');
});

Route::get('/movies/detail/{id}', 'MoviesController@searchById');
Route::get('/movies/find/{name}', 'MoviesController@findMovieByName');

Route::get('/movies', function () {
	$result = Movie::all();
	dd($result);
});

// Route::get('/actors', function () {
// 	$actors = Actor::all();
//
// 	foreach ($actors as $oneActor) {
// 		echo $oneActor->getFullName() . '<br>';
// 	}
// });

Route::get('/actors', 'ActorsController@index');
Route::get('/actors/{id}', 'ActorsController@show');

// Si queremos un Controller con la plantilla de todos los métodos más comunes hacemos: php artisan make:controller EntitiesController --resource
