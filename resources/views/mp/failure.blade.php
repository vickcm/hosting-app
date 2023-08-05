@extends('layouts.main')

@section('title', 'Contratación Falló :: Nube web')

@section('main')
<section class="section-nosotros">
    <div class="d-flex flex-column align-items-center">
        <picture>
                <source srcset="{{ url('img/contratacion-fallo-desktop.jpg') }}" media="(min-width:768px)">
                <img class="img-fluid" alt="contratacion fallida, personas trabajando" src="{{ url('img/contratacion-fallo-mobile.jpg') }}">
        </picture>
        <div>
            <h1 class="mt-md-5 mb-md-3">
                La contratacion del hosting, falló.
            </h1>
            <p class="mt-2 text-center">
                Por favor, si seguís teniendo problemas, ponete en contacto con nuestro equipo de atención al cliente.
            </p>
        </div>
    </div>
</section>
@endsection