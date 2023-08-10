@extends('layouts.app')

@section('content')
    @include('layouts.navegacion')
    <div class="container principal">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        ¡Panel de Control Administrador!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
