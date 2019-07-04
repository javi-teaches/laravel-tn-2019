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
	// protected $guarded = ['col1', 'col2'];

	// Para traer el valor de la fecha como tal
	protected $dates = ['release_date'];

	// Relation con Géneros
	public function genre()
	{
		return $this->belongsTo(Genre::class, 'genre_id', 'id');
		// 1er parámetro = El modelo (tabla) con el que se relaciona
		// 2do parámetro = La columna en ESTA tabla que guarda la FK
		// 3er parámetro = La columna en la OTRA tabla que tiene el PK
	}

	public function actors()
	{
		return $this->belongsToMany(Actor::class);
	}
}
