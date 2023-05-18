<?php
/** @var \App\Models\Product[]|\Illuminate\Database\Eloquent\Collection $products
 * @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts
 */
?>
@extends('layouts.main')

@section('header-hero')
    <div class="col-12 col-md-5 p-3 text-right">
        <label class="text-uppercase text-secondary-emphasis fw-medium">crea tu propio sitio con</label>
        <h1 class="text-uppercase text-white fs-2">
            premium hosting
        </h1>
        <p class="text-uppercase text-secondary-emphasis fw-medium">
            minitexto                         
        </p>
        <button class="btn btn-danger">Ver Productos</button>
    </div>
    <div class="col-12 col-md-7">
        <picture>
            <source  srcset="{{ url('img/section-uno-desktop.png') }}" media="(min-width:768px)">
            <img class="img-fluid" alt="persona mirando compu creando una idea" src="{{ url('img/section-uno-mobile.png') }}">
        </picture>
    </div>
@endsection

@section('main')
<div class="col-12">
    <h2 class="text-center mt-3">¿Porqué Elegirnos?</h2>
</div>
<div class="col-12">
    <div class="d-flex justify-content-evenly">
        <div class="card mb-3">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">99.0% Garantía de tiempo de actividad</p>
            </div>
        </div>
        <div>
            <img>
            <p></p>
        </div>
        <div>
            <img>
            <p>Seguro y Protegido</p>
        </div>
        <div>
            <img>
            <p>Nuestro Apoyo Dedicado</p>
        </div>
    </div>
</div>
<div>
    <p>¿Estas interesado? Unite a nuestro newsletter de novedades</p>
</div>
@endsection

@section('products')
<div class="row">
    <x-product-data :products="$products" /> 
</div>
<div class="row">
    <x-latest-posts :posts="$posts"/>
</div> 
@endsection