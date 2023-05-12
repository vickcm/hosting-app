<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts */

?>

@section('title', 'Confirmación de eliminación de entrada')

@extends('layouts.admin')

<h2>Entrada seleccionada para borrar </h2>

@section('abm-post')

    @include('posts._post-data')

<form action="{{ route('posts.processDelete', ['id' => $post->id] ) }}" method="post">
    @csrf
    <p>
        ¿Estás seguro que querés borrar esta entrada?
    </p>
    <button class="btn btn-danger" type="submit">
        Confirmo eliminación 

    </button>
    
</form>


   

        
       
@endsection