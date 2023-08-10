@extends('layouts.app')

@section('content')
    @include('layouts.navegacion')
   <div class="container principal">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-success">Tabla de Usuarios</h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="tabla" class="table table-striped table-hover table-borderless">
                        <thead class="table-dark">
                            <tr>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Cédula</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Celular</th>
                                <th>Ciudad</th>
                                <th>Fecha Creación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->cedula }}</td>
                                <td>{{ $user->birthdate }}</td>
                                <td>{{ $user->cell_number }}</td>
                                <td>{{ $user->nombre_municipio}}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('editUser', ['userId' => $user->id]) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('deleteUser', ['userId' => $user->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
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