@extends('layouts.main')

@section('title', 'Mi Cuenta :: Nube web')

@section('main')
    <h1 class="text-center mb-5 mt-5 blog">Mi Cuenta</h1>
    <div class="row perfil mb-5">
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
                                    class="btn btn-dashboard">
                                    Editar Perfil
                                </a>
                            </div>
                        @else
                            <div class="col-12 col-md-6">
                                <a href="{{ route('profiles.createProfile') }}" class="btn btn-dashboard">Crear Perfil</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <h2 class="mb-4 fs-4 text-center mt-4">Productos Contratados</h2>
            @if ($contractedProducts->count() > 0)
                <ul class="list-group list-group-flush">
                    @foreach ($contractedProducts as $product)
                        <li class="list-group-item d-flex justify-content-center align-items-center">
                            Producto: {{ $product->title }}
                            <br>
                            Precio: {{ $product->pivot->price_paid }} 
                            <br>
                            Fecha de contratación:
                            {{ \Carbon\Carbon::parse($product->pivot->created_at)->format('d/m/Y H:i:s') }}
                            <br>
                            <a href="{{ route('products.confirmCancelProduct', ['id' => $product->product_id]) }}"
                                class="ms-3 btn p-cancelar">
                                Cancelar Suscripción
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center">No tienes productos contratados.</p>
            @endif

            <h2 class="mb-4 fs-4 text-center">Productos Cancelados</h2>
            @if ($cancelProducts->count() > 0)
                <ul class="list-group list-group-flush">
                    @foreach ($cancelProducts as $product)
                        <li class="list-group-item d-flex justify-content-center align-items-center">
                            Producto:{{ $product->title }}
                            <br>
                            Precio: {{ $product->pivot->price_paid }}
                            <br>
                            Fecha de cancelación:
                            {{ \Carbon\Carbon::parse($product->pivot->updated_at)->format('d/m/Y H:i:s') }}

                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center">No tienes productos contratados.</p>
            @endif
        </div>
    </div>
@endsection
