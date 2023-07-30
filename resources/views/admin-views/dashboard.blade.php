<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts */
use Illuminate\Support\Str;

?>
@extends('layouts.admin')
@section('title', 'Listado de Entradas')
@section('abm-post')

    <div>
        BIENVENIDO DASHBOARD

    </div>
    <div>
        nombre de usuario:
        {{ auth()->user()->username }}
    </div>



    <div>
        <p>Cantidad de Posteos totales: {{ count($posts) }}</p>
        <p>Cantidad de posteos en el último mes: {{ $cantidadPosteosUltimoMes }}
        </p>

        <p>Cantidad de Posteos por autor: </p>
        @foreach ($cantidadPosteosPorAutor as $autor)
            <p>Autor: {{ $autor->name }} - Cantidad de posteos: {{ $autor->posts_count }}</p>
        @endforeach
    </div>

    <div>
        @if ($autorConMasPosteosUltimoMes)
            <p>Autor con más posteos en el último mes: {{ $autorConMasPosteosUltimoMes->name }} - Cantidad de posteos:
                {{ $autorConMasPosteosUltimoMes->posts_count }}</p>
        @endif
    </div>
    <p>Monto total recaudado en el mes actual: ${{ $montoTotalRecaudadoMesActual }}</p>
    <p>Cantidad de productos vendidos en el mes: {{ $cantidadProductosVendidosMesActual }} </p>

    <p>Cliente con mayor suma de dinero gastado en el mes actual:</p>
    @if ($clienteMayorSumaDineroGastado)
        <p>Nombre: {{ $clienteMayorSumaDineroGastado->username }}</p>
        <p>Email: {{ $clienteMayorSumaDineroGastado->email }}</p>
        <p>Total gastado: ${{ $clienteMayorSumaDineroGastado->total_amount_spent }}</p>
    @else
        <p>No hay datos disponibles.</p>
    @endif

@endsection
