@extends('layouts.main')

@section('title', 'Mi Cuenta')

@section('main')
<div class="container mt-4">
    <h1 class="mb-4">Mi cuenta</h1>

    <h2>Datos de Usuario</h2>
    <p><span class="font-weight-bold">Nombre de usuario:</span> {{ $user->username }}</p>
    <p><span class="font-weight-bold">Email:</span> {{ $user->email }}</p>

    @if ($profile)
        <!-- Mostrar datos de perfil -->
    @else
        <p class="mt-4">No se ha encontrado perfil asociado a este usuario.</p>
    @endif

    <h2 class="mt-4">Productos contratados</h2>
    @if ($contractedProducts->count() > 0)
        <ul>
            @foreach ($contractedProducts as $product)
                <li>{{ $product->title }} - Precio: {{ $product->pivot->price_paid }} - Fecha de contratación: {{ $product->pivot->created_at }}</li>
            @endforeach
        </ul>
    @else
        <p>No tienes productos contratados.</p>
    @endif
</div>
@endsection
