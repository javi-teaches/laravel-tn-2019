@extends('front.template')

@section('pageTitle', 'Listado de películas')

@section('mainContent')
	<h2>Listado de películas</h2>
	<p>En nuestra base de datos hay un total de {{ $totalMovies }} películas.</p>
	<a href="/movies/create" class="btn btn-success">crear película</a>

	<ul>
		@foreach ($movies as $movie)
			<li>
				<a href="/movies/{{ $movie->id }}"> {{ $movie->title }} </a>
			</li>
		@endforeach
	</ul>

	{{-- Imprimo la paginación --}}
	{{ $movies->links() }}

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
