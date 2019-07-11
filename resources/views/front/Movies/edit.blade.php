@extends('front.template')

@section('pageTitle', 'Editando una película')

@section('mainContent')
	<h2>Formulario para editar la película: {{ $movieToEdit->title }}</h2>

	{{-- Errores si los hubiera --}}
	@if (count($errors))
		<ul>
			@foreach ($errors->all() as $error)
				<li class="text-danger"> {{ $error }} </li>
			@endforeach
		</ul>
	@endif

	<form action="/movies/{{ $movieToEdit->id }}" method="post" enctype="multipart/form-data">
		@csrf
		{{ method_field('put') }}
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label>Title</label>
					<input
						type="text"
						name="title"
						value="{{ old('title', $movieToEdit->title) }}"
						class="form-control"
					>
					@if ($errors->has('title'))
						<span class="text-danger">
							{{ $errors->first('title') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label>Rating</label>
					<input
						type="text"
						name="rating"
						value="{{ old('rating', $movieToEdit->rating) }}"
						class="form-control"
					>
					@if ($errors->has('rating'))
						<span class="text-danger">
							{{ $errors->first('rating') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label>Awards</label>
					<input
						type="text"
						name="awards"
						value="{{ old('awards', $movieToEdit->awards) }}"
						class="form-control"
					>
					@if ($errors->has('awards'))
						<span class="text-danger">
							{{ $errors->first('awards') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label>Release date</label>
					<input
						type="date"
						name="release_date"
						value="{{ old('release_date', $movieToEdit->release_date->format('Y-m-d')) }}"
						class="form-control"
					>
					@if ($errors->has('release_date'))
						<span class="text-danger">
							{{ $errors->first('release_date') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label>Length</label>
					<input
						type="text"
						name="length"
						value="{{ old('length', $movieToEdit->length) }}"
						class="form-control"
					>
					@if ($errors->has('length'))
						<span class="text-danger">
							{{ $errors->first('length') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label>Genre</label>
					<select class="form-control" name="genre_id">
						@foreach ($genres as $genre)
							<option
								value="{{ $genre->id }}"
								{{ $genre->id === $movieToEdit->genre_id ? 'selected' : null }}
							>{{ $genre->name }}</option>
						@endforeach
					</select>
					@if ($errors->has('genre_id'))
						<span class="text-danger">
							{{ $errors->first('genre_id') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label>Subí una imagen</label>
					<input type="file" name="poster" class="form-control">
				</div>
			</div>

			<div class="col-12">
				<button type="submit" class="btn btn-success">ENVIAR</button>
			</div>
		</div>
	</form>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
@endsection
