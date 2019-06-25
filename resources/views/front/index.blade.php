@extends('front.template')

@section('pageTitle', 'Página de inicio')

@section('mainContent')
	<h1>Variable que viene del archivo de rutas: <?php echo $saludo . ' y ' .$despedida ; ?> </h1>

	<h2>Películas</h2>

	<ul>
		@foreach ($movies as $movie)
			<li>
				{{ $movie['title'] }} - {{ $movie['rating'] }}
			@unless ($movie['rating'] < 9)
				- <strong>Son excelentes películas</strong>
			@endunless
			</li>
		@endforeach
	</ul>

	<h2>Actores</h2>
	@forelse ($actores as $actor)
		<p> {{ $actor }} </p>
	@empty
		<p>No hay actores en la lista.</p>
	@endforelse

	<h2>Estamos en la home</h2>
	<img src="/images/arya-stark.jpg" alt="Arya Stark">
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<a href="#">Algún lugar</a>
@endsection
