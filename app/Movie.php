<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	// Si mi tabla se llama distinto
	// protected $table = 'Peliculas';

	// Especifico las columnas que SI se pueden llenar con datos
	protected $fillable = ['title', 'rating', 'awards', 'release_date', 'length', 'genre_id', 'poster'];

	// Especifico las columnas que NO se pueden llenar con datos
	// protected $guarded = [];
}
