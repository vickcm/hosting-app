<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts
 */
?>

@extends('layouts.main')

@section('title', $post->title)

@section('main')
<section class="section-entrada-blog">
    <h1 class="visually-hidden">Detalle del post {{ $post->title }}</h1>
    <a href="{{ route('posts') }}" class="btn mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/></svg>
        Volver al listado de posteos
    </a>
    <article class="row justify-content-center mt-3">
        <div class="col-12">
            <p class="">{{ $post->category->name }} // {{$post->author->name}} </p>
        </div>
        <div class="col-12 col-md-6 d-flex align-items-center">
            <h2 class="card-title fw-semibold">{{ $post->title }}</h2>
        </div>
        <div class="col-12 col-md-4 mb-3 mt-3 mt-md-0">
            @if ($post->image !== null && Storage::has('img/' . $post->image))
                <div>
                    <img class="img-fluid" src="{{ Storage::url('img/' . $post->image) }}" alt="{{ $post->image_description }}">
                </div>
            @else
                <img class="img-fluid" src="{{ url('img/datacenter300x300.jpg') }}" alt="sala de servidores">
            @endif
        </div>
        {{--   El bucle @foreach itera sobre cada objeto $post y luego utiliza explode("\n", $post->content) para dividir el contenido en párrafos en función de las líneas nuevas (\n). Luego, se muestra cada párrafo dentro de una etiqueta <p> utilizando {{ $paragraph }}. --}}
        <div class="post col-12">
            @foreach (explode("\n", $post->content) as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>
    </article>
</section>
@endsection