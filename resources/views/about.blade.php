@extends('layouts.main')

@section('main')
<section class="section-nosotros">
    <div class="row">
        <div class="col-12 col-md-6">
            <picture>
                <source srcset="{{ url('img/sobre-nosotros-desktop.jpg') }}" media="(min-width:768px)">
                <img class="img-fluid" alt="equipos de personas trabajando" src="{{ url('img/sobre-nosotros-mobile.jpg') }}">
            </picture>
        </div>
        <div class="col-12 col-md-6">
            <h1 class="mt-md-5 mb-md-3">
                ¡Bienvenido a NubeWeb!
            </h1>
            <label class="mt-2">
                En NubeWeb, nos apasiona brindar soluciones de <strong> <span lang="en">hosting</span> confiables y de alto rendimiento </strong>  para tu presencia en línea. Nos enorgullece ofrecer un entorno seguro y estable para alojar tus sitios web, aplicaciones y proyectos digitales.</label>
            <label class="mt-2">
                <strong> Nuestra misión es simplificar tu experiencia en la nube,</strong> proporcionándote servicios de <span lang="en">hosting</span>  sólidos y escalables. Ya seas un emprendedor, una pequeña empresa o una organización en crecimiento, nuestro objetivo es asegurarnos de que encuentres en NubeWeb la plataforma perfecta para tus necesidades.
            </label>
        </div>    
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="text-center mt-3 mb-3">
                ¿Qué nos hace diferentes?
            </h2>
        </div>
        <div class="col-12 col-md-5 div-diferentes">
            <label class="text-center fw-medium">
                Rendimiento superior
            </label>
            <hr>
            <label>
                Contamos con servidores de última generación y una infraestructura optimizada para garantizar velocidades de carga rápidas y tiempos de respuesta excepcionales.
            </label>
        </div>
        <div class="col-12 col-md-5 div-diferentes">
            <label  class="text-center fw-medium">
                Seguridad de primer nivel
            </label>
            <hr>
            <label>
                Tu seguridad es nuestra prioridad. Implementamos medidas rigurosas para proteger tus datos y salvaguardar tus sitios web y aplicaciones de cualquier amenaza potencial.
            </label>
        </div>
        <div class="col-12 col-md-5 div-diferentes">
            <label class="text-center fw-medium">
                Soporte experto
            </label>
            <hr>
            <label>
                Nuestro equipo de soporte técnico está disponible las 24 horas del día, los 7 días de la semana, para ayudarte en cualquier momento. Estamos aquí para resolver tus dudas y brindarte asistencia personalizada cuando más lo necesites.
            </label>
        </div>
        <div class="col-12 col-md-5 div-diferentes">
            <label class="text-center fw-medium">
                Flexibilidad y escalabilidad
            </label>
            <hr>
            <label>
                Entendemos que tus necesidades pueden cambiar con el tiempo. Por eso, ofrecemos planes de <span lang="en">hosting</span> flexibles y escalables, para que puedas ajustar tu infraestructura según tu crecimiento y demanda.
            </label>
        </div>
        
    </div>
    <div class="row align-items-center last-div">
        <div class="col-12 col-md-6">
            <label>
                En <strong>NubeWeb</strong>, nos enorgullece respaldar tu éxito en línea. Te invitamos a unirte a nuestra comunidad de clientes satisfechos y descubrir la diferencia que podemos hacer en tu proyecto digital.
                <strong>¡Haz crecer tu presencia en línea con NubeWeb hoy mismo!</strong>
            </label>
            <a href="{{ route('home') }}" class="btn btn-dashboard mt-2">Ver <span lang="en"> hostings </span>disponibles</a>
        </div>
        <div class="col-12 col-md-6">
            <picture>
                <source srcset="{{ url('img/cloud-desktop.jpg') }}" media="(min-width:768px)">
                <img class="img-fluid" alt="server en nube" src="{{ url('img/cloud-mobile.jpg') }}">
            </picture>
        </div>
    </div>
</section>
@endsection