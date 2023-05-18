<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>@yield('title') :: NubeWeb </title>
    <link rel="icon" href="{{ url('img/logo.png') }}">
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg main-nav" >
                <div class="container">
                    <a class="navbar-brand text-white" href="{{ route('home') }}">NubeWeb <img src="{{ url('img/logo.png') }}" alt="logo del sitio, nube web" width="30" height="24" class="d-inline-block align-text-top"> </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Abrir/cerrar menú de navegación">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path></svg>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link text-white" href="{{ route('home') }}">Inicio</a>
                                <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('about') }}">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('posts') }}">Blog</a>
                            </li> 
                            @auth
                            <li class="nav-item">
                                <form action="{{ route('auth.processLogout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn  nav-link">{{ auth()->user()->email }} (Cerrar Sesión)</button>
                                </form>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('auth.formLogin') }}">Iniciar Sesión</a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container-fluid container-fluid-lg">
         
            @if (Session::has('message'))
            <div class="alert alert-{{ Session::get('type') }} alert-dismissible fade show" role="alert">
                <p>{!! Session::get('message') !!}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
            @endif

            @yield('main')
            
           
        </main>
        <footer class="d-flex justify-content-center align-items-center">
            <p class="m-0">Micaela Guggiari && Victoria Castro Mena &copy; 2023 || Portales y Comercio Electronico || Santiago Gallino</p>
        </footer>
    </div>
    <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
</body>
</html>