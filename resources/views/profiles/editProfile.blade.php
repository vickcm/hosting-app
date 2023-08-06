@extends('layouts.main')

@section('title', 'Editar Perfil :: Nube web')

@section('main')
<h1 class="text-center mb-5 mt-5 blog">Editar Perfil</h1>
    <div class="row mb-5 justify-content-md-center align-items-md-center form-register">
        <div class="col-12 col-md-5">
            <picture>
                <source srcset="{{ url('img/perfil-desktop.jpg') }}" media="(min-width:768px)">
                <img class="img-fluid" alt="chica trabajando" src="{{ url('img/perfil-mobile.jpg') }}">
            </picture>
        </div>
        <div class="col-12 col-md-6">
            <form action="{{ route('profiles.editProfile', ['id' => $user->user_id  ] ) }}" method="post" >
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control"
                        placeholder="Ingrese el nombre de la categoria"
                        @error('name')
                        aria-describedby="error-name" 
                        @enderror
                        value="{{ old('name', $user->name) }}">
                    @error('name')
                        <div class="text-danger mt-1 bg-light p-2" id="error-name">
                            <i class="bi bi-exclamation-triangle" title="error"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea id="description" name="description" class="form-control"
                    @error('description') aria-describedby="error-description" @enderror
                    >{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <div class="text-danger mt-1 bg-light p-2" id="error-description">
                            <i class="bi bi-exclamation-triangle" title="error"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning me-3">Editar Perfil</button>
                    <a href="{{ route('dashboardCategories') }}" class="btn btn-cancelar"> 
                        Cancelar
                    </a>
                </div>
            </form>
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