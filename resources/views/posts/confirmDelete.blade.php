<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts */
?>

@section('title', 'Confirmación de eliminación de entrada')

@extends('layouts.admin')

@section('abm-post')
    <h2 class="text-center">Entrada seleccionada para borrar </h2>
    @include('posts._post-data')
    <div class="d-flex justify-content-center mt-3">
        <form action="{{ route('posts.processDelete', ['id' => $post->id] ) }}" method="post">
            @csrf
            <p>
                ¿Estás seguro que querés borrar esta entrada?
            </p>
            <button class="btn btn-danger" type="submit">
                Confirmo eliminación 
            </button>
            <a href="{{ route('home') }}" class="btn btn-success" type="submit"> <!-- ACA VA EL LINK ADMIN -->
                Cancelar
            </a>
        </form>
    </div>
@endsection