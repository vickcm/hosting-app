<?php
// Laravel crea en todas las vistas de Blade, automáticamente, una variable $errors de tipo ViewErrorBag.
// Esta variable contiene los mensajes de error que hayan ocurrido, en caso de haberlos.
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Category[]|\Illuminate\Database\Eloquent\Collection $categories */

?>

@extends('layouts.admin')

@section('title', 'Publicar una Entrada')

@section('abm-post')
    <h1 class="mb-3 text-center titulo-admin">Publicar una Entrada</h1>
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
                <label for="category_id" class="form-label">Categoría</label>
                <select
                    name="category_id"
                    id="category_id"
                    class="form-control"
                    @error('category_id') aria-describedby="error-category_id" @enderror
                >
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->category_id }}"
                            @selected(old('category_id') == $category->category_id)
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger" id="error-category_id">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Autor</label>
                <select
                    name="author_id"
                    id="author_id"
                    class="form-control"
                    @error('author_id') aria-describedby="error-author_id" @enderror
                >
                    @foreach($authors as $author)
                        <option
                            value="{{ $author->author_id }}"
                            @selected(old('author_id') == $author->author_id)
                        >{{ $author->name }}</option>
                    @endforeach
                </select>
                @error('author_id')
                    <div class="text-danger" id="error-author_id">{{ $message }}</div>
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
            <div class="mb-3">
                <label for="image_description" class="form-label">Ingrese la descripción de la imagen</label>
                <input type="text" id="image_description" name="image_description" class="form-control"
                placeholder="Ingrese la descripción de la imagen"
                @error('image_description')
                aria-describedby="error-image_description" 
                @enderror
                value="{{ old('title') }}">
                @error('image_description')
                    <div class="text-danger mt-1 bg-light p-2" id="error-image_description">
                        <i class="bi bi-exclamation-triangle" title="error"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary me-3">Publicar</button>
                <a href="{{ route('dashboardPosts') }}" class="btn btn-success">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection