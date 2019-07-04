@extends('front.template')

@section('pageTitle', 'Perfil de ' . $theActor->getFullName())

@section('mainContent')
	<h2>Perfil de: {{ $theActor->getFullName() }}</h2>
	<p><b>Rating</b>: {{ $theActor->rating }}</p>
	<p><b>Película favorita</b>: {{ $theActor->favorite_movie_id }}</p>
	<p>Películas del actor:</p>
	<ul>
		@foreach ($theActor->movies as $movie)
			<li> {{ $movie->title }} </li>
		@endforeach
	</ul>
@endsection
