<?php
// Laravel crea en todas las vistas de Blade, automáticamente, una variable $errors de tipo ViewErrorBag.
// Esta variable contiene los mensajes de error que hayan ocurrido, en caso de haberlos.
/** @var \Illuminate\Support\ViewErrorBag $errors */
use Illuminate\Support\Facades\Storage;

/* echo '<pre>';
print_r ($post);
echo '</pre>'; */
?>

@extends('layouts.admin')

@section('title', 'Publicar una Entrada')

@section('abm-post')
    <h2 class="mb-3">Publicar una Entrada</h2>


    <form action="{{ route('posts.processEdit', ['id' => $post->id  ] ) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" id="title" name="title" class="form-control"
                placeholder="Ingrese el título de la entrada"
                @error('title')
                aria-describedby="error-title" 
                @enderror
                value="{{ old('title', $post->title) }}">

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
                value="{{ old('user_id', $post->user_id) }}"  
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
                value="{{ old('category_id', $post->category_id) }}"  >
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
            >{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="text-danger mt-1 bg-light p-2" id="error-content">
                    <i class="bi bi-exclamation-triangle" title="error"></i>
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3"> Imagen actual 
            @if($post->image !== null && Storage::has('img/' . $post->image))
                <img class="mw-100" src="{{ Storage::url('img/' . $post->image) }}" alt="{{ $post->image_description }}">
        @else
            <p>Acá iría una imagen diciendo que no hay imagen.</p>
        @endif

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

        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
@endsection
