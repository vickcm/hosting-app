<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>@yield('title') :: NubeWeb </title>
    <link rel="icon" href="{{ url('img/logo.png') }}">
</head>

<body>
    <div id="app">

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
                <div class="container-fluid">
                    <a class="navbar-brand text-warning" href="{{ route('home') }}">Hosting Servicio</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                        aria-controls="navbar" aria-expanded="false" aria-label="Abrir/cerrar menú de navegación">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link " href="{{ route('home') }}">Home</a>
                                <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">Quiénes Somos</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts') }}">Blog</a>
                            </li> 
                            

                           @auth
                           <li class="nav-item">
                            <form action="{{ route('auth.processLogout') }}" method="post">
                                @csrf
                              
                                <button type="submit" class="btn  nav-link">{{ auth()->user()->username }} (Cerrar Sesión)</button>
                            </form>
                        </li>
                             
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('auth.formLogin') }}">Iniciar Sesión</a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container py-3">
                @yield('header-hero')

            </div>
         
    

        </header>

     
        <main class="container py-3">

            @if (Session::has('message'))
            <div class="alert alert-{{ Session::get('type') }} alert-dismissible fade show"
                role="alert">
                <p>{!! Session::get('message') !!}
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar">

                </button>
            </div>
        @endif

            <section>
                @yield('main')
            </section>

            <section>
                @yield('products')
            </section>
            

        </main>



        <footer class="bg-dark text-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Información de contacto</h5>
                        <p>Teléfono: 555-1234<br>Email: info@misitio.com</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Redes sociales</h5>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="#">Facebook</a></li>
                            <li class="list-inline-item"><a href="#">Twitter</a></li>
                            <li class="list-inline-item"><a href="#">Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </div>


    <script src="{{ url('bootstrap.bundle.js') }}"></script>

</body>

</html>
