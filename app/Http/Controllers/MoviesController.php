<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
	protected $peliculas = [
		1 => "Toy Story",
		2 => "Buscando a Nemo",
		3 => "Avatar",
		4 => "Star Wars: Episodio V",
		5 => "Up",
		6 => "Mary and Max"
	];

	public function searchById($id)
	{
		$movieFound = 'No se encontró la película';

		foreach ($this->peliculas as $position => $movie) {
			if ($position == $id) {
				$movieFound = 'La película es: ' . $movie;
			}
		}

		return view('front.movies', compact('movieFound'));
	}

	public function findMovieByName($name)
	{
		dd($name);

		$movieFound = 'No se encontró la película';

		foreach ($this->peliculas as $position => $movie) {
			if ($movie == $name) {
				$movieFound = 'La película es: ' . $movie;
			}
		}

		return view('front.movies', compact('movieFound'));
	}
}
