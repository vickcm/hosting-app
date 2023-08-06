@extends('layouts.main')

@section('title', 'Mi Cuenta')

@section('main')
<h1 class="text-center mb-5 mt-5 blog">Mi Perfil</h1>
    <div class="row mb-5 justify-content-md-center align-items-md-center form-register">
        <div class="col-12 col-md-5">
            <picture>
                <source srcset="{{ url('img/perfil-desktop.jpg') }}" media="(min-width:768px)">
                <img class="img-fluid" alt="chica trabajando" src="{{ url('img/perfil-mobile.jpg') }}">
            </picture>
        </div>
        <div class="col-12 col-md-6">
            <div>
                <p class="fw-semibold mb-1">Nombre:</p>
                <p class="fw-normal">{{ $user->username }}</p>
            </div>
            <div>
                <p class="fw-semibold mb-1">Mail:</p>
                <p class="fw-normal">{{ $user->email }}</p>
            </div>
            <div>
                @if ($profile)
                    <!-- Mostrar datos de perfil -->
                @else
                    <p class="mt-4">No se ha encontrado perfil asociado a este usuario.</p>
                @endif
            </div>
            <div>
                <h2 class="mt-4 fs-4">Productos contratados</h2>
                @if ($contractedProducts->count() > 0)
                    <ul>
                        @foreach ($contractedProducts as $product)
                            <li>{{ $product->title }} - Precio: {{ $product->pivot->price_paid }} - Fecha de contratación: {{ $product->pivot->created_at }} <button class="btn p-cancelar">Cancelar Suscripción</button></li>
                        @endforeach
                    </ul>
                @else
                    <p>No tienes productos contratados.</p>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="" class="btn btn-dashboard">Editar Perfil</a>
        </div>
    </div>
@endsection