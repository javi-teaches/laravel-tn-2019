<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
	public function index()
	{
		// return view('front.index', ['saludo' => 'Hola mundo']);
		// return view('front.index')->with('saludo', 'Hello world!');
		// return view('front.index')->with([
		// 	'saludo' =>'Hello world!',
		// 	'despedida' => 'see ya!!'
		// ]);
		$saludo = 'Qué haces chabón!';
		$despedida = 'Chauuuu';
		$movies = [
			[
				'title' => 'Toy Story',
				'rating' => 10
			],
			[
				'title' => 'Star Wars',
				'rating' => 9
			],
			[
				'title' => 'Avatar',
				'rating' => 8
			],
		];

		$actores = [];
		return view('front.index', compact('saludo', 'despedida', 'movies', 'actores'));
	}


	public function sayHello($name)
	{
		return 'Hola ' . $name;
	}
}
