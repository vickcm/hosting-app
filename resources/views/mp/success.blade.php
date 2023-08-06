@extends('layouts.main')

@section('title', 'Contratación Éxitosa :: Nube web')

@section('main')
<section class="section-nosotros">
    <div class="d-flex flex-column align-items-center">
        <picture>
                <source srcset="{{ url('img/contratacion-exitosa-desktop.jpg') }}" media="(min-width:768px)">
                <img class="img-fluid" alt="contratacion exitosa, personas celebrando" src="{{ url('img/contratacion-exitosa-mobile.jpg') }}">
        </picture>
        <div>
            <h1 class="mt-md-5 mb-md-3">
                ¡La contratacioón del hosting  <span class="fw-bold">{{ $product->title }} </span>  fue realizada con éxito!
            </h1>
            <p class="mt-2 text-center">
                Felicitaciones, ya puedes empezar hacer uso del mismo. Cualquier consulta, no dudes en contactarnos.
            </p>

            <div class="d-flex justify-content-center mt-5 mb-4">
                <a href="{{ route('profiles.viewProfile') }}" class="btn btn-primary">Productos Contratados</a>
           
        </div>
    </div>
</section>
@endsection