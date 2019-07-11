@extends('front.template')

@section('pageTitle', 'Detalle de la película')

@section('mainContent')
	<img src="/storage/posters/{{ $movie->poster }}" width="50%">
	<h2>Detalle de: {{ $movie->title }}</h2>
	<p>Rating: {{ $movie->rating }}</p>
	<p>Length: {{ $movie->length }}</p>
	{{-- Relación con la tabla Géneros --}}
	<p>Genre: {{ $movie->genre->name }}</p>

	<p>Actores en esta película</p>
	<ul>
		@foreach ($movie->actors as $actor)
			<li>{{ $actor->getFullName() }}</li>
		@endforeach
	</ul>

	<form action="/movies/{{ $movie->id }}" method="post">
		@csrf
		{{ method_field('delete') }}
		<a href="/movies/{{ $movie->id }}/edit" class="btn btn-info">Editar Película</a>
		<button type="submit" class="btn btn-danger">BORRAR</button>
	</form>
@endsection
