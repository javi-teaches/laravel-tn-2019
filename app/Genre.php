<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  public function movies()
  {
  	return $this->hasMany(Movie::class, 'genre_id', 'id');
		// 1er parámetro = El modelo (tabla) con el que se relaciona
		// 2do parámetro = La columna en ESA tabla que guarda la FK
		// 3er parámetro = La columna en ESTA tabla que tiene el PK
  }
}
