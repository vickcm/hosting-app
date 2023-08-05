<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $users */
?>
@extends('layouts.admin')

@section('title', $user->username . ' ' . 'Listado de productos adquiridos :: Nube web')

@section('abm-post')
<div class="mb-3 d-flex justify-content-center cards-abm">
    <div class="card me-3">
        <div class="card-body">
            <p class="card-text">Total de Productos adquiridos</p>
            <p class="card-title">{{ $user->products->count() }}</p>
        </div>
    </div>
</div>
<div class="card client-table col-12">
    <div class="card-header d-flex flex-column">
        <h1 class="fs-3">{{ $user->username }}</h1>
        <p>{{ $user->email }}</p>
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
                                <td>{{ $product->subtitle }}</td>
                                <td>{{ $product->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-3">
    <a href="{{ route('dashboardUsers') }}" class="btn mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/></svg>
        Volver al listado de Usuarios   
    </a>
</div>
@endsection