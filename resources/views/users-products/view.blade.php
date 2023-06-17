<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $users */
?>
@extends('layouts.admin')
@section('title', 'Listado de Entradas')
@section('abm-post')

<div class="card client-table">
    <div class="card-header d-flex flex-column flex-md-row justify-content-md-between align-items-center">
        <h1 class="fs-3">{{ $user->username }} id: {{ $user->user_id }}</h1>
        <p>{{ $user->email }}</p>
        <p>{{ $user->products->count() }}cantidad de productos </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($user->products->isEmpty())
                <p>No tiene productos comprados.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Fecha de Compra</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

@endsection
