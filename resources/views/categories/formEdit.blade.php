<?php
// Laravel crea en todas las vistas de Blade, automáticamente, una variable $errors de tipo ViewErrorBag.
// Esta variable contiene los mensajes de error que hayan ocurrido, en caso de haberlos.
/** @var \Illuminate\Support\ViewErrorBag $errors */

?>

@extends('layouts.admin')

@section('title', 'Editar Categoria')

@section('abm-post')
    <h1 class="mb-3 text-center titulo-admin">
        Editar Categoría
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
    </h1>
    <div class="form-editar">
        <form action="{{ route('categories.processEdit', ['id' => $category->category_id  ] ) }}" method="post" >
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" id="name" name="name" class="form-control"
                    placeholder="Ingrese el nombre de la categoria"
                    @error('name')
                    aria-describedby="error-name" 
                    @enderror
                    value="{{ old('name', $category->name) }}">
                @error('name')
                    <div class="text-danger mt-1 bg-light p-2" id="error-name">
                        <i class="bi bi-exclamation-triangle" title="error"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea id="description" name="description" class="form-control"
                @error('description') aria-describedby="error-description" @enderror
                >{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="text-danger mt-1 bg-light p-2" id="error-description">
                        <i class="bi bi-exclamation-triangle" title="error"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-warning me-3">Editar Categoria</button>
                <a href="{{ route('dashboardCategories') }}" class="btn btn-cancelar"> 
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection