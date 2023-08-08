@extends('layouts.app')

@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5 entrada">
                    <img src="{{ asset('logo.png') }}" class="Logo" alt="Logo" id="Logo">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ url('/login') }}">
                        @csrf
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Ingreso XXXXXX S.A.</p>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg"
                            placeholder="Ingrese su correo" name="correo" autocomplete="on" value="{{ old('email') }}" required/>
                            <label class="form-label" for="correo">Correo Electronico</label>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="password" id="password" class="form-control form-control-lg"
                            placeholder="Ingrese su contraseña" name="password" autocomplete="current-password"/>
                            <label class="form-label" for="password">Contraseña</label>
                        </div>
                        <center>
                        <div class="">
                            <button type="submit" class="btn btn-lg" style=" background-color:#3B365F; color:white;">Ingresar</button>
                        </div>
                        </center>
                        @if ($errors->any())
                            <div style="color: red;">
                                {{ $errors->first() }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="Footer">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-uppercase fw-bold mb-4">Pagina Oficial</h6>
                    <p>
                        <a href="https://paginadeejemplo.com" class="text-reset">https://paginadeejemplo.com</a>
                    </p>
                </div>
                <div class="col-6">
                    <h6 class="text-uppercase fw-bold mb-4">Soporte Técnico</h6>
                    <p>ejemplo@dominio.com</p>
                    <p>ejemplo2@dominio.com</p>
                </div>
            </div>

            <!-- Redes Sociales -->
            <div class="row mt-4">
                <div class="col-4">
                    <h6 class="text-uppercase fw-bold mb-4">Facebook</h6>
                    <p>
                        <a href="#" class="text-reset"><i class="fab fa-facebook-square fa-3x me-2"></i>EmpresaSA</a>
                    </p>
                </div>
                <div class="col-4">
                    <h6 class="text-uppercase fw-bold mb-4">Twitter</h6>
                    <p>
                        <a href="#" class="text-reset"><i class="fab fa-twitter-square fa-3x me-2"></i>@empresaSA</a>
                    </p>
                </div>
                <div class="col-4">
                    <h6 class="text-uppercase fw-bold mb-4">Instagram</h6>
                    <p>
                        <a href="#" class="text-reset"><i class="fab fa-instagram-square fa-3x me-2"></i>@empresa.SA</a>
                    </p>
                </div>
            </div>
        </div>     
    </footer>
     <div>
        <div class="p-3" style="background-color: #3B364F; color:white; text-align: center;">
        © 2023 Copyright: <a class="text-reset fw-bold">Joan Osorio</a>
    </div>
@endsection
