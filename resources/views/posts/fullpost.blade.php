<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts
 */
?>

@extends('layouts.main')

@section('title', 'Home')

@section('main')
<section class="section-entrada-blog">
    <a href="{{ route('posts') }}" class="btn mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/></svg>
        Volver al listado de posteos
    </a>
    <article class="row justify-content-center mt-3">
        <div class="col-12 col-md-4 mb-3">
            @if ($post->image !== null && Storage::has('img/' . $post->image))
                <div>
                    <img src="{{ Storage::url('img/' . $post->image) }}" alt="{{ $post->image_description }}">
                </div>
            @else
                <img src="{{ url('img/datacenter300x300.jpg') }}" alt="sala de servidores">
            @endif
            <p class="">{{ $post->category->name }} </p>
        </div>
        <div class="col-12 col-md-8">
            <h2 class="card-title fw-semibold">{{ $post->title }}</h2>
        </div>
        <div class="col-12">
            <p class="card-text">{{ $post->content }}</p>
        </div>
        
    </article>
</section>
@endsection