<?php
// Laravel crea en todas las vistas de Blade, automáticamente, una variable $errors de tipo ViewErrorBag.
// Esta variable contiene los mensajes de error que hayan ocurrido, en caso de haberlos.
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

@extends('layouts.admin')

@section('title', 'Publicar una Categoria')

@section('abm-post')
<h1 class="mb-3 text-center titulo-admin">Crear una Categoría</h1>
<div class="form-nueva-entrada">
    <form action="{{ route('categories.processNew') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" id="name" name="name" class="form-control"
            placeholder="Ingrese el nombre de la categoría"
            @error('name')
            aria-describedby="error-name" 
            @enderror
            value="{{ old('name') }}">
            @error('name')
                <div class="text-danger mt-1 bg-light p-2" id="error-name">
                    <i class="bi bi-exclamation-triangle" title="error"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripcion</label>
            <textarea id="description" name="description" class="form-control"
            @error('description') aria-describedby="error-description" @enderror
            >{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger mt-1 bg-light p-2" id="error-description">
                    <i class="bi bi-exclamation-triangle" title="error"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary me-3">Crear</button>
            <a href="{{ route('dashboardCategories') }}" class="btn btn-cancelar"> 
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection