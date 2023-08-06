@extends('layouts.main')

@section('title', 'Mi Cuenta :: Nube web')

@section('main')
    <h1 class="text-center mb-5 mt-5 blog">Mi Cuenta</h1>
    <div class="row perfil">
        <div class="col-12 col-lg-6 perfil-div">
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

                        @if ($profile)
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
                            <div class="d-flex justify-content-center mt-2 mb-4 mb-lg-0">
                                <a href="{{ route('profiles.editProfile', ['id' => $profile->profile_id]) }}"
                                    class="btn btn-dashboard">Editar Perfil</a>
                            </div>
                        @else
                            <div class="col-12 col-md-6">

                                <a href="{{ route('profiles.createProfile') }}"
                                    class="btn btn-dashboard">Crear Perfil</a>

                            </div>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <h2 class="mb-4 fs-4 text-center">Productos Contratados</h2>
            @if ($contractedProducts->count() > 0)
                <ul class="list-group list-group-flush">
                    @foreach ($contractedProducts as $product)
                        <li class="list-group-item d-flex justify-content-center align-items-center">{{ $product->title }} -
                            Precio: {{ $product->pivot->price_paid }} - Fecha de contratación:
                            {{ $product->pivot->created_at }} 
                            <a href="{{ route('products.confirmCancelProduct', ['id' => $product->product_id]) }}" class="btn btn-danger d-flex align-items-center justify-content-around">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg>
                                cancelar
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center">No tienes productos contratados.</p>
            @endif
        </div>
    </div>
@endsection
