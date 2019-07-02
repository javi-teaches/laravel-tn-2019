@extends('front.template')

@section('pageTitle', 'Buscador de actores')

@section('mainContent')
	<div class="container">
		<form action='/actors/result/' method="get">
			<div class="form-group">
				<label>Buscar Actor</label>
				<input type="text" name="word" class="form-control">
			</div>
			<button type="submit" class="btn btn-info">Buscar</button>
		</form>
	</div>
@endsection
