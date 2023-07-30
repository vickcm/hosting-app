@extends('layouts.admin')
@section('title', 'Listado de Entradas')
@section('abm-post')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h4>BIENVENIDO DASHBOARD</h4>
                <p>Nombre de usuario: {{ auth()->user()->username }}</p>
                <p>Email: {{ auth()->user()->email }}</p>
            </div>
        </div>
        
        <div class="row my-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Cantidad de Posteos totales
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ count($posts) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Cantidad de posteos en el último mes
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $cantidadPosteosUltimoMes }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row my-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Cantidad de Posteos por autor
                    </div>
                    <div class="card-body">
                        @foreach ($cantidadPosteosPorAutor as $autor)
                            <p class="card-text">Autor: {{ $autor->name }} - Cantidad de posteos: {{ $autor->posts_count }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @if ($autorConMasPosteosUltimoMes)
                    <div class="card">
                        <div class="card-header">
                            Autor con más posteos en el último mes
                        </div>
                        <div class="card-body">
                            <p class="card-text">Autor: {{ $autorConMasPosteosUltimoMes->name }}</p>
                            <p class="card-text">Cantidad de posteos: {{ $autorConMasPosteosUltimoMes->posts_count }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="row my-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Monto total recaudado en el mes actual
                    </div>
                    <div class="card-body">
                        <p class="card-text">${{ $montoTotalRecaudadoMesActual }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Cantidad de productos vendidos en el mes
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $cantidadProductosVendidosMesActual }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row my-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Cliente con mayor suma de dinero gastado en el mes actual
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
