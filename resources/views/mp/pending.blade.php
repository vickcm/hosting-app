@extends('layouts.main')

@section('title', 'Contratación Pendiente :: Nube web')

@section('main')
<section class="section-nosotros">
    <div class="d-flex flex-column align-items-center">
        <picture>
                <source srcset="{{ url('img/contratacion-pendiente-desktop.jpg') }}" media="(min-width:768px)">
                <img class="img-fluid" alt="contratacion pendiente, personas trabajando" src="{{ url('img/contratacion-pendiente-mobile.jpg') }}">
        </picture>
        <div>
            <h1 class="mt-md-5 mb-md-3">
                La contratacion del hosting  está pendiente.
            </h1>
            <p class="mt-2 text-center">
                Por favor, ponete en contacto con nuestro equipo de atención al cliente.
            </p>
        </div>
    </div>
</section>
@endsection