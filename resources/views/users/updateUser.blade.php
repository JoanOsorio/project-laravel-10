@extends('layouts.app')

@section('content')
    @include('layouts.navegacion')
    <div class="container principal">
        <div class="row">
            <div class="col-xl-4 col-lg-4 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Actualizar Usuario</h6>
                    </div>
                </div>
            </div>
            <form class="form-control" method="POST" action="{{ url('/updateUser') }}" onsubmit="validarFormulario()">
                @csrf
                <div class="row mt-4">
                    <div class="col-3 text-center">
                        <label for="correo">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="{{ $datosUsuario->email }}" readonly>
                    </div>
                    <div class="col-2 text-center">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $datosUsuario->name }}" maxlength="100" required>
                    </div>
                    <div class="col-2 text-center">
                        <label for="telefono">Teléfono o Celular</label>
                        <input type="number" class="form-control" name="telefono" pattern="[0-9]{1,10}" value="{{ $datosUsuario->cell_number}}">
                    </div>
                    <div class="col-3 text-center">
                        <label for="cedula">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" value="{{ $datosUsuario->cedula }}" pattern="[0-9]+" maxlength="11" required disabled>
                    </div>
                    <div class="col-2 text-center">
                        <label for="fechaNacimiento">Fecha De Nacimiento</label>
                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" max="{{ date('Y-m-d', strtotime('-18 years')) }}" value="{{ $datosUsuario->birthdate }}" required>
                    </div>
                 
                </div>
                <div class="row mt-4">
                    <div id="paisData" data-pais="{{ $countryAndDept->pais }}"></div>
                    <div id="departamentoData" data-departamento="{{ $countryAndDept->depto_id }}"></div>
                    <div id="ciudadData" data-ciudad="{{ $datosUsuario->city_code }}"></div>                        
                    <div class="col-4 text-center">
                            <label for="pais">Pais</label>
                            <select id="pais" name="pais" class="form-control" onchange="cargarDepartamentos()">
                                <option value="">Seleccione un país</option>
                            </select>
                        </div>
                        <div class="col-4 text-center">
                            <label for="departamento">Departamento</label>
                            <select id="departamento" name="departamento" class="form-control" onchange="cargarCiudades()">
                                <option value="">Seleccione un departamento</option>
                            </select>
                        </div>
                        <div class="col-4 text-center">
                            <label for="ciudad">Ciudad o Municipio</label>
                            <select id="ciudad" name="ciudad" class="form-control" required>
                                <option value="">Seleccione una ciudad</option>
                            </select>
                        </div>
                    </div>
                <div class="row mt-4">
                    <div class="col-xl-2 col-lg-1 mx-auto">
                        <button type="submit" class="btn btn-success">Actualizar Usuario</button>
                    </div>
                </div>
                <br>
            </form>
            @if(session('success'))
                <div class="alert alert-success mt-4">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    <script src="{{ asset('js/users.js') }}"></script>
@endsection
