<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts */
?>


@extends('layouts.admin')


@section('title', 'Listado de Entradas')


@section('abm-post')
    <h1 class="mb-3">Entradas - Posteos</h1>


    <div class="mb-3">
        <a class="btn btn-outline-secondary" role="button" href="{{ route('posts.formNew') }}">Publicar una Nueva Entrada</a>
    </div>


    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Título</th>
                <th>Contenido</th>
                <th>Usuario</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="fw-semibold">{{ $post->title }}</td>
                    <td>{{ $post->getShortContent($post->content, 300) }}</td>
                    <td>{{ $post->user_id }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        <div class="d-flex gap-2">

                            <a href="{{ route('posts.view', ['id' => $post->id]) }}" class="btn btn-secondary">
                                <i class="bi bi-eye" title="Ver"></i>
                            </a>

                            <a href="{{ route('posts.formEdit', ['id' => $post->id]) }}" class="btn btn-warning"> 
                                <i class="bi bi-pencil-square" title="Editar">
                                </i></a>
                            <a href="{{ route('posts.confirmDelete', ['id' => $post->id]) }}" class="btn btn-danger">
                                <i class="bi bi-trash3" title="Borrar"></i></a>

                        </div>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
