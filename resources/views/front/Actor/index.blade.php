@extends('front.template')

@section('pageTitle', 'Listado de actores')

@section('mainContent')
	<ul>
		@foreach ($actors as $actor)
			<li>
				<em>{{ $actor->getFullName() }} </em>
				<a href="/actors/{{ $actor->id }}" class="btn btn-success">ver detalle</a>
			</li>
			<br>
		@endforeach
	</ul>
@endsection
