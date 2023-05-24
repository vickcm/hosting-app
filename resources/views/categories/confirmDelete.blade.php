<?php
/** @var \App\Models\Category[]|\Illuminate\Database\Eloquent\Collection $categories */
?>

@section('title', 'Confirmación de eliminación de Categoria')

@extends('layouts.admin')

@section('abm-post')
    <h1 class="text-center ">Categoría seleccionada para borrar  
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg>
    </h1>
    <div class="d-flex justify-content-center flex-column align-items-center mt-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title">{{ $category->name }}</h3>
                <p class="card-text">{{ $category->description }}</p>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <a href="{{ route('dashboardPosts') }}" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/></svg>
            Volver al Panel de Administracion
        </a>
    </div>
    <div class="mt-3">
        <form action="{{ route('categories.processDelete', ['id' => $category->category_id] ) }}" method="post" class="d-flex justify-content-center flex-column align-items-center">
            @csrf
            <p class="fw-bold">
                ¿Estás seguro que querés borrar esta categoría?
            </p>
            <button class="btn btn-cancelar" type="submit">
                Confirmo eliminación 
            </button>
        </form>
    </div>
@endsection