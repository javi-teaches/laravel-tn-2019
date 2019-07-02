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

/*
	Start - Rutas de prueba
*/
Route::get('/', 'WebController@index');
Route::get('/saludar/{name}', 'WebController@sayHello');
Route::get('/admin', function () {
	return view('back.index');
});

/*
	Rutas Recurso Movies
*/
Route::get('/movies', 'MoviesController@index'); // Index para películas
Route::post('/movies', 'MoviesController@store'); // Guardar en DB
Route::get('/movies/create', 'MoviesController@create'); // Formulario para crear

/*
	Rutas Recurso Actors
*/
Route::get('/actors', 'ActorsController@index');
Route::get('/actors/search', 'ActorsController@search');
Route::get('/actors/result/', 'ActorsController@result');
Route::get('/actors/{id}', 'ActorsController@show');

// Si queremos un Controller con la plantilla de todos los métodos más comunes hacemos: php artisan make:controller EntitiesController --resource
