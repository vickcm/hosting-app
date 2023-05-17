<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">


    <title>@yield('title') :: Hosting - Servicio </title>
</head>

<body>
    <div id="app">
        
        <div class="container-fluid m-0">
            <div class="row">
                <header class="col-2">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-left vh-100">
                        <div class="container-fluid flex-column">
                          <a class="navbar-brand  d-flex flex-column justify-content-center" href="{{ route('home') }}">Mi Sitio</a>
                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav flex-column">
                              <li class="nav-item">
                                <a class="nav-link" href="#">Inicio</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Nosotros</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Productos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Contacto</a>
                              </li>
                            </ul>
                          
                          </div>
                        </div>
                    </nav>
                    
                </header>
              

              
                  
                <div class="col-10">
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
                        @yield('abm-post')
                    </main>
                </div>
            </div>
        </div>
        <footer class="bg-dark text-white py-3">
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
