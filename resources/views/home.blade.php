@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

										<h1>Hola {{ Auth::user()->name }}</h1>
										<img src="/storage/avatars/{{ Auth::user()->avatar }}" width="100">
										<br>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
