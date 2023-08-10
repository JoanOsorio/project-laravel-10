@extends('layouts.app')

@section('content')
    @include('layouts.navegacion')
        <div class="container principal">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mx-auto">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-success">Registrar Usuario</h6>
                        </div>   
                    </div>
                </div>            
                <form class="form-control" method="POST" action="{{ url('/createUser')}}" onsubmit="validarFormulario()" >
                    @csrf
                    <div class="row mt-4">
                        <div class="col-4 text-center">
                            <label for="correo">Email</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="col-4 text-center">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" minlength="8" required pattern="^(?=.*\d)(?=.*[A-Z])(?=.*\W).*$">
                            <small id="passwordlHelp" class="form-text text-muted" style="font-size:10px;">La contraseña debe contener al menos 8 caracteres, debe contener al menos un número, una letra mayúscula, un carácter especial.</small>
                        </div>
                        <div class="col-4 text-center">
                            <label for="cpassword">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" onchange="validarPassword()" required>
                        </div>                           
                    </div>
                    <div class="row mt-4">
                        <div class="col-3 text-center">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="100" required  >
                        </div>
                        <div class="col-3 text-center">
                            <label for="telefono">Telefono o Celular</label>
                            <input type="number" class="form-control" name="telefono" pattern="[0-9]{1,10}">
                        </div> 
                        <div class="col-3 text-center">
                            <label for="cedula">Cedula</label>
                            <input type="text" class="form-control" id="cedula" name="cedula" pattern="[0-9]+" maxlength="11" required>
                        </div>
                        <div class="col-3 text-center">
                            <label for="fechaNacimiento">Fecha De Nacimiento</label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" max="{{ date('Y-m-d', strtotime('-18 years')) }}" required>
                        </div>
                    </div>
                    <div class="row mt-4">
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
                            <button type="submit" class="btn btn-success" >Registrar Usuario</button>
                        </div>
                    </div>
                    <br>
                </form>           
                </div> 
                @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
                @endif  
            </div>
        </div>
        <script src="{{ asset('js/users.js') }}"></script>
@endsection




