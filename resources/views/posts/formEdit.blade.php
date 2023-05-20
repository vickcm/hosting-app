<?php
// Laravel crea en todas las vistas de Blade, automáticamente, una variable $errors de tipo ViewErrorBag.
// Esta variable contiene los mensajes de error que hayan ocurrido, en caso de haberlos.
/** @var \Illuminate\Support\ViewErrorBag $errors */
use Illuminate\Support\Facades\Storage;



@extends('layouts.admin')

@section('title', 'Editar Entrada')

@section('abm-post')
    <h2 class="mb-3 text-center titulo-admin">
        Editar Entrada 
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
    </h2>
    <div class="form-editar">
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
            <div class="mb-3 fw-semibold"> Imagen actual 
                @if($post->image !== null && Storage::has('img/' . $post->image))
                    <img class="mw-100" src="{{ Storage::url('img/' . $post->image) }}" alt="{{ $post->image_description }}">
                @else
                <img class="mw-100" src="{{ url('img/datacenter300x300.jpg') }}" alt="sala de servidores">

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
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-warning me-3">Editar Entrada</button>
                <a href="{{ route('dashboardPosts') }}" class="btn btn-success" type="submit"> <!-- ACA VA EL LINK ADMIN -->
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection