<?php
// Laravel crea en todas las vistas de Blade, automáticamente, una variable $errors de tipo ViewErrorBag.
// Esta variable contiene los mensajes de error que hayan ocurrido, en caso de haberlos.
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

@extends('layouts.admin')

@section('title', 'Publicar una Entrada')

@section('abm-post')
!doctype html>
<html lang="es">
<head>
    <h2 class="mb-3 text-center titulo-admin">Publicar una Entrada</h2>
    <div class="form-nueva-entrada">
        <form action="{{ route('posts.processNew') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" id="title" name="title" class="form-control"
                placeholder="Ingrese el título de la entrada"
                @error('title')
                aria-describedby="error-title" 
                @enderror
                value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger mt-1 bg-light p-2" id="error-title">
                        <i class="bi bi-exclamation-triangle" title="error"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario</label>
                <input type="number" id="user_id" name="user_id" class="form-control"
                @error('user_id')
                aria-describedby="error-user_id" 
                @enderror
                value="{{ old('user_id') }}"  
                >
                @error('user_id')
                    <div class="text-danger mt-1 bg-light p-2" id="error-user_id">
                        <i class="bi bi-exclamation-triangle" title="error"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría</label>
                <input type="number" id="category_id" name="category_id" class="form-control"
                    @error('category_id')
                    aria-describedby="error-catergory_id" 
                    @enderror
                    value="{{ old('category_id') }}"  >
                @error('category_id')
                    <div class="text-danger mt-1 bg-light p-2" id="error-category_id">
                        <i class="bi bi-exclamation-triangle" title="error"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenido</label>
                <textarea id="content" name="content" class="form-control"
                @error('content') aria-describedby="error-content" @enderror
                >{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-danger mt-1 bg-light p-2" id="error-content">
                        <i class="bi bi-exclamation-triangle" title="error"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image">Imagen</label>
                <input type="file" id="image" name="image" class="form-control"
                @error('image') aria-describedby="error-image" @enderror
                >
                @error('image')
                    <div class="text-danger mt-1 bg-light p-2" id="error-image">
                        <i class="bi bi-exclamation-triangle" title="error"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary me-3">Publicar</button>
                <a href="{{ route('home') }}" class="btn btn-success" type="submit"> <!-- ACA VA EL LINK ADMIN -->
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection