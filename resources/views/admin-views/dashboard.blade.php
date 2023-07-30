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
@endsection
