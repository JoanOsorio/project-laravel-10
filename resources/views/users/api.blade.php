@extends('layouts.app')

@section('content')
    @include('layouts.navegacion')
    <div class="container principal">
        <div class="row">
            <div class="col-md-9"> <!-- Columna para los posts -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2 class="m-0 font-weight-bold text-success">Posts</h2>
                    </div>   
                </div>
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4 mb-4 fade-in" style="animation-delay: {{ $loop->index * 0.2 }}s;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post['title'] }}</h5>
                                    <p class="card-text">{{ $post['body'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
                 
            <div class="col-md-3"> <!-- Columna para la información del usuario -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-success">Información del Usuario</h4>
                    </div>   
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $user['name'] }}</h3>
                        <p class="card-text"><strong>Nombre de usuario:</strong> {{ $user['username'] }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $user['email'] }}</p>
                        <p class="card-text"><strong>Teléfono:</strong> {{ $user['phone'] }}</p>
                        <p class="card-text"><strong>Dirección:</strong> {{ $user['address']['street'] }}, {{ $user['address']['suite'] }}, {{ $user['address']['city'] }}</p>
                        <p class="card-text"><strong>Sitio web:</strong> {{ $user['website'] }}</p>
                        <p class="card-text"><strong>Compañía:</strong> {{ $user['company']['name'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection