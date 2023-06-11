<?php
/** @var \App\Models\Product[]|\Illuminate\Database\Eloquent\Collection $products
 * @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts
 */
?>

@extends('layouts.main')

@section('title', 'Home')

@section('main')
<section class="section-uno row">
    <div class="col-12 col-md-5 p-3 text-right d-flex  justify-content-center justify-content-md-end align-items-center">
        <div>
            <p class="text-uppercase fw-medium">crea tu propio sitio con</p>
            <h1 class="text-uppercase text-white fs-2">
                NubeWeb
            </h1>
            <p class="text-uppercase fw-medium">
                premium hosting
            </p>
            <a href="#productos_ancla" class="btn btn-dashboard">Ver Productos</a>
        </div>
    </div>
    <div class="col-12 col-md-7 d-flex justify-content-center justify-content-md-start">
        <picture>
            <source srcset="{{ url('img/section-uno-desktop.png') }}" media="(min-width:768px)">
            <img class="img-fluid" alt="persona mirando compu creando una idea" src="{{ url('img/section-uno-mobile.png') }}">
        </picture>
    </div>
</section>
<section id="productos_ancla" class="section-dos">
    <div class="row">
        <x-product-data :products="$products" />
    </div>
</section>
<section class="section-tres">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <hr>
        </div>
        <div class="col-12 mt-3">
            <h2 class="text-center">¿Por qué Elegirnos?</h2>
        </div>
        <div class="col-12 mt-3">
            <div class="d-flex justify-content-evenly flex-column flex-md-row align-items-center">
                <div class="card-body-dos">
                    <img src="{{ url('img/server.png') }}" alt="nuve atendiendo servidor">
                    <p class="fw-semibold text-center mt-2">99.9% Garantía de tiempo de actividad</p>
                </div>
                <div class="card-body-dos mt-2 mt-md-0">
                    <img src="{{ url('img/encrypted.png') }}" class="card-img-top" alt="...">
                    <p class="fw-semibold text-center mt-2">Seguro y Protegido</p>
                </div>
                <div class="card-body-dos mt-2 mt-md-0">
                    <img src="{{ url('img/helpline.png') }}" class="card-img-top" alt="...">
                    <p class="fw-semibold text-center mt-2">Nuestro Apoyo Dedicado</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-cuatro row">
    <x-latest-posts :posts="$posts" />
</section>
@endsection