<?php
/** @var \App\Models\Product[]|\Illuminate\Database\Eloquent\Collection $products */

?>

@section('title', 'Productos')

@extends('layouts.main')


@section('main')




    <h2 class="mb-3">Productos</h2>

    <div class="row">
       @include('products._allproducts-data')
        
      </div>
      

        
       
@endsection