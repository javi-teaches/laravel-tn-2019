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
		// $movies = Movie::all();
		$movies = Movie::paginate(5);
		$totalMovies = count(Movie::all());

		return view('front/Movies/index', compact('movies', 'totalMovies'));
	}

	public function show($id)
	{
		$movie = Movie::find($id);

		return view('front.Movies.show', compact('movie'));
	}

	// Muestra el formulario de crear películas
	public function create()
	{
		// Traer todo los géneros de la DB
		$genres = \App\Genre::orderBy('name')->get();

		return view('front.Movies.create', compact('genres'));
	}

	public function store(Request $request)
	{
		// 1. Validamos
		$request->validate([
			// input_name => rules,
			'title' => 'required | max:15',
			'rating' => 'required | numeric | min:0 | max:10',
			'awards' => 'required | numeric',
			'release_date' => 'required',
			'length' => 'required | numeric',
			'genre_id' => 'required',
			'poster' => 'required | image'
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

		// 2. Guardamos en DB
		// Movie::create([
		// 	'title' => $request->input('title'),
		// 	'ranking' => $request->input('ranking'),
		// 	'length' => $request->input('length'),
		// 	'release_date' => $request->input('release_date'),
		// ]);

		// Guardo la película en DB y dejo en una variable $movie
		// $movie = Movie::create($request->except('_token'));
		$movie = new Movie; // Objeto de tipo Movie Vacio

		// Asocio atributos con valores
		$movie->title = $request->input('title');
		$movie->rating = $request->input('rating');
		$movie->awards = $request->input('awards');
		$movie->release_date = $request->input('release_date');
		$movie->length = $request->input('length');
		$movie->genre_id = $request->input('genre_id');

		// Obtengo el archivo que viene en el formulario (Objeto de Laravel) que tiene a su vez el archivo de la imagen
		$imagen = $request->files(); // El value del atributo name del input file

		if ($imagen) {
			// Armo un nombre único para este archivo
			$imagenFinal = uniqid("img_") . "." . $imagen->extension();

			// Subo el archivo en la carpeta elegida
			$imagen->storePubliclyAs("public/posters", $imagenFinal);

			// Le asigno la imagen a la película que guardamos
			$movie->poster = $imagenFinal;
		}

		$movie->save();

		// 3. Redireccionamos SIEMPRE a una RUTA
		return redirect('/movies');
	}

	public function destroy($id)
	{
		// Busco la Movie
		$movieToDelete = Movie::find($id);

		// La borro
		$movieToDelete->delete();

		// Redireccionamos SIEMPRE a una RUTA
		return redirect('/movies');
	}

	public function edit($id)
	{
		// Busco la Movie
		$movieToEdit = Movie::find($id);

		// Busco los géneros
		$genres = \App\Genre::orderBy('name')->get();

		return view('front.Movies.edit', compact('movieToEdit', 'genres'));
	}

	public function update(Request $request, $id)
	{
		$movieToUpdate = Movie::find($id);

		$movieToUpdate->title = $request->input('title');
		$movieToUpdate->rating = $request->input('rating');
		$movieToUpdate->awards = $request->input('awards');
		$movieToUpdate->release_date = $request->input('release_date');
		$movieToUpdate->length = $request->input('length');
		$movieToUpdate->genre_id = $request->input('genre_id');

		// Obtengo el archivo que viene en el formulario (Objeto de Laravel) que tiene a su vez el archivo de la imagen
		$imagen = $request->files(); // El value del atributo name del input file

		if ($imagen) {
			// Armo un nombre único para este archivo.
			$imagenFinal = uniqid("img_") . "." . $imagen->extension();

			// Subo el archivo en la carpeta elegida
			$imagen->storePubliclyAs("public/posters", $imagenFinal);

			// Le asigno la imagen a la película que guardamos
			$movieToUpdate->poster = $imagenFinal;
		}

		$movieToUpdate->save();

		// Redireccionamos SIEMPRE a una RUTA
		return redirect('/movies');
	}
}
