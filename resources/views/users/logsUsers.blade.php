@extends('layouts.app')

@section('content')
    @include('layouts.navegacion')
    <div class="container principal">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-success">Tabla de Logs Usuarios</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="tabla" class="table table-striped table-hover table-borderless">
                            <thead class="table-dark">
                                <tr>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userLogs as $log)
                                <tr>
                                    <td>{{ $log->user->name }}</td>
                                    <td>{{ $log->action }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>    
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif
    </div>  
    <script src="{{ asset('js/datatable.js') }}"></script>
@endsection