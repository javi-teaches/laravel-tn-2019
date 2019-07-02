@extends('front.template')

@section('pageTitle', 'Listado de actores')

@section('mainContent')
	<ul>
		@forelse ($actors as $actor)
			<li>
				<em>{{ $actor->getFullName() }} </em>
				<a style="display: inline-block;" href="/actors/{{ $actor->id }}" class="btn btn-success">ver detalle</a>
			</li>
		@empty
			<li>No hay resultados</li>
		@endforelse
	</ul>
@endsection
