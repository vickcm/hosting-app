<?php
/** @var \App\Models\Product[]|\Illuminate\Database\Eloquent\Collection $products
 * @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts
 */
?>

@extends('layouts.main')

@section('header-hero')
    <div class="hero">
        <div class="container">
            <h2 class="text-lg">Hosting y dominios para tu web</h2>
            <p class="fw-bold">"¡Descubre nuestros planes de hosting y comienza a construir tu sitio web hoy!</p>
            <a class="btn btn-secondary btn-lg" href="#" role="button">Conocer más</a>
        </div>
    </div>
@endsection




@section('main')
   <h2 class="pb-2 border-bottom">Destacado</h2>
      <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="feature col">
            <div class="feature-icon bg-primary bg-gradient">
                
            </div>
            <h2>Featured title</h2>
            <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and
                probably just keep going until we run out of words.</p>
            <a href="#" class="icon-link">
                Call to action
                
            </a>
        </div>
        <div class="feature col">
            <div class="feature-icon bg-primary bg-gradient">
                
            </div>
            <h2>Featured title</h2>
            <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and
                probably just keep going until we run out of words.</p>
            <a href="#" class="icon-link">
                Call to action
               
            </a>
        </div>
        <div class="feature col">
            <div class="feature-icon bg-primary bg-gradient">
            
            </div>
            <h2>Featured title</h2>
            <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and
                probably just keep going until we run out of words.</p>
            <a href="#" class="icon-link">
                Call to action
                
            </a>
        </div>
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
