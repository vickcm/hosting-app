@extends('layouts.main')

@section('title', 'Mi Cuenta :: Nube web')

@section('main')
<h1 class="text-center mb-5 mt-5 blog">Mi Cuenta</h1>
    <div class="row mb-5 justify-content-md-center align-items-md-center perfil">
        <div class="col-12 col-md-6 perfil-div">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-5">
                    <picture>
                        <source srcset="{{ url('img/perfil-desktop.jpg') }}" media="(min-width:768px)">
                        <img class="img-fluid" alt="chica trabajando" src="{{ url('img/perfil-mobile.jpg') }}">
                    </picture>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div>
                            <h2 class="mb-4 fs-4 text-center">Datos de Perfil</h2>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="fw-semibold mb-1">User:</p>
                            <p class="fw-normal">{{ $user->username }}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="fw-semibold mb-1">Mail:</p>
                            <p class="fw-normal">{{ $user->email }}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="fw-semibold mb-1">Nombre Completo:</p>
                            <p class="fw-normal">{{ $profile->full_name }}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="fw-semibold mb-1">Fecha de nacimiento:</p>
                            <p class="fw-normal">{{ $profile->formatted_birth_date }}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="fw-semibold mb-1">Teléfono:</p>
                            <p class="fw-normal">{{ $profile->phone_number }}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="fw-semibold mb-1">Dirección:</p>
                            <p class="fw-normal">{{ $profile->address }}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            @if ($profile)
                                <!-- Mostrar datos de perfil -->
                            @else
                                <p class="mt-4 ">No se ha encontrado perfil asociado a este usuario.</p>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <a href="" class="btn btn-dashboard">Editar Perfil</a>
                    </div>
                </div>      
            </div>
        </div>
        <div class="col-12 col-md-6">
            <h2 class="mt-4 fs-4 text-center">Productos contratados</h2>
            @if ($contractedProducts->count() > 0)
                <ul class="list-group list-group-flush">
                    @foreach ($contractedProducts as $product)
                        <li class="list-group-item d-flex justify-content-center align-items-center">{{ $product->title }} - Precio: {{ $product->pivot->price_paid }} - Fecha de contratación: {{ $product->pivot->created_at }} <button class="btn p-cancelar">Cancelar Suscripción</button></li>
                    @endforeach
                </ul>
            @else
                <p class="text-center">No tienes productos contratados.</p>
            @endif
        </div>
    </div>
@endsection