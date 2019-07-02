<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

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

	public function index()
	{
		$movies = Movie::all();

		return view('front/Movies/index', compact('movies'));
	}

	public function create()
	{
		return view('front.Movies.create');
	}

	public function store(Request $request)
	{
		// validación
		$request->validate([
			// input_name => rules,
			'title' => 'required | max:15',
			'rating' => 'required | numeric | min:0 | max:10',
			'awards' => 'required | numeric',
			'release_date' => 'required',
			'length' => 'required | numeric',
			'genre_id' => 'required',
		], [
			// input_name.rule => message
			// 'title.required' => 'El campo título es obligatorio',
			// 'rating.required' => 'El campo rating es obligatorio',
			'required' => 'El campo :attribute es obligatorio',
			'numeric' => 'El campo :attribute debe ser numérico',
			'title.max' => 'El :attribute debe contener máximo 15 carácteres',
			'rating.min' => 'El mínimo permitido es 0',
			'rating.max' => 'El máximo permitido es 10'
		]);

		dd($request->except('_token'));
	}
}
