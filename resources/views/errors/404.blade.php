@extends('layouts.main')

@section('title', __('No encontrado'))
@section('code', 'La página no fue encontrada pero te invitamos a seguir navegando por nuestro sitio.')


@section('main')
<section class="row">
    <div class="col-12 col-md-5 p-3 text-right d-flex  justify-content-center justify-content-md-end align-items-center">
        <div>
            <h1 class="fs-2">
                ¡Ups! Ha ocurrido un error...
            </h1>
            <p>Te invitamos a ver nuestros últimos posteos mientras trabajamos en ello</p>
            <button class="btn btn-dashboard">Ver posteos</button>
        </div>
    </div>
    <div class="col-12 col-md-7 d-flex justify-content-center justify-content-md-start">
        <picture>
            <source srcset="{{ url('img/error-desktop.jpg') }}" media="(min-width:768px)">
            <img class="img-fluid" alt="persona mirando compu creando una idea" src="{{ url('img/error-mobile.jpg') }}">
        </picture>
    </div>
</section>
@endsection