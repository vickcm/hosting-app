@extends('layouts.admin')
@section('title', 'Dashboard :: Nube web')
@section('abm-post')
<div class="client-table mt-4">
    <div class="row">
        <div class="col-md-6">
            <h1 class="titulo-admin">Dashboard</h1>
            <p class="p-color">Descripción general y resumen de ventas</p>
            <p class="visually-hidden">Estás logueado con el usuario: {{ auth()->user()->username }}</p>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-12 col-md-3 my-2">
            <div class="cards-graficos">
                <div class="cards-graficos-header">
                    <i class="bi bi-grid"></i>
                    <p class="ms-2 p-color">Posteos Totales</p>
                </div>
                <div>
                    <p class="fs-4 mb-0 ms-2">{{ count($posts) }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 my-2">
            <div class="cards-graficos">
                <div class="cards-graficos-header">
                    <i class="bi bi-grid"></i>
                    <p class="ms-2 p-color">Posteos en el último mes</p>
                </div>
                <div>
                    <p class="fs-4 mb-0 ms-2">{{ $cantidadPosteosUltimoMes }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 my-2">
            <div class="cards-graficos">
                <div class="cards-graficos-header">
                    <i class="bi bi-bag"></i>
                    <p class="ms-2 p-color">Productos vendidos en el mes</p>
                </div>
                <div>
                    <p class="fs-4 mb-0 ms-2">{{$cantidadProductosVendidosMesActual }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 my-2">
            <div class="cards-graficos">
                <div class="cards-graficos-header">
                    <i class="bi bi-currency-dollar"></i>
                    <p class="ms-2 p-color">Total recaudado en el mes actual</p>
                </div>
                <div>
                    <p class="fs-4 mb-0 ms-2">${{ $montoTotalRecaudadoMesActual }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 my-2 card-grafico">
            <div class="card">
                <div class="card-header">
                    <p class="fw-semibold mb-0">Cantidad de Posteos por autor</p>
                </div>
                <div class="card-body">
                    <ul class=" list-unstyled">
                        @foreach ($cantidadPosteosPorAutor as $autor)
                            <li class="mb-2">{{ $autor->name }}: {{ $autor->posts_count }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 my-2 card-grafico">
            @if ($autorConMasPosteosUltimoMes)
                <div class="card">
                    <div class="card-header">
                        <p class="fw-semibold mb-0">Autor con más posteos en el último mes</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Autor: {{ $autorConMasPosteosUltimoMes->name }}</p>
                        <p class="card-text">Cantidad de posteos: {{ $autorConMasPosteosUltimoMes->posts_count }}</p>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-12 col-md-6 my-2 card-grafico">
            <div class="card">
                <div class="card-header">
                    <p class="fw-semibold mb-0">Cliente con mayor suma de dinero gastado en el mes actual</p>
                </div>
                <div class="card-body">
                    @if ($clienteMayorSumaDineroGastado)
                        <p class="card-text">Nombre: {{ $clienteMayorSumaDineroGastado->username }}</p>
                        <p class="card-text">Email: {{ $clienteMayorSumaDineroGastado->email }}</p>
                        <p class="card-text">Total gastado: ${{ $clienteMayorSumaDineroGastado->total_amount_spent }}</p>
                    @else
                        <p class="card-text">No hay datos disponibles.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection