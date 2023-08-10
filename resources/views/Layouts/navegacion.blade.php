<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @auth
                <li class="nav-item">
                    @if(auth()->user()->role === \App\Models\User::ROLE_ADMIN)
                        <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a class="nav-link active" aria-current="page" href="{{ url('/dashboardu') }}">Dashboard</a>
                    @endif    
                </li>
                @if(auth()->user()->role === \App\Models\User::ROLE_ADMIN)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestionar Usuarios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/createUser') }}">Crear Usuario</a></li>
                            <li><a class="dropdown-item" href="{{ url('/adminUsers') }}">Administración de Usuarios</a></li>
                            <li><a class="dropdown-item" href="{{ url('/userLogs') }}">Logs de Usuarios</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Consumo de API
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/users') }}">Listado de Usuarios</a></li>
                        </ul>
                    </li>    
                @endif    
            @endauth    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Mi Perfil
                    </a>
                    <ul class="dropdown-menu">

                        <li>
                            <form action="{{ url('/logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item" style="background: none; border: none; padding: 0; cursor: pointer;"> <a class="dropdown-item" >Cerrar Sesión</a></button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="text-end">
                <p>Nombre: {{Auth::user()->name}} </p>
                <p>Correo: {{Auth::user()->email}} </p>
            </div>
            <div class="logo-p">
                <img src="{{ asset('logo.png') }} " alt="imagen pequeña" width="70px" id="logo-p"/> 
            </div>
        </div>
    </div>
</nav>