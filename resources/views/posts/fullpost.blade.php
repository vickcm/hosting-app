<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts
 *

 */
?>

@extends('layouts.main')

@section('title', 'Home')

@section('main')

    <article class="row justify-content-center h-100 mt-5">

        @if ($post->image !== null && Storage::has('img/' . $post->image))
            <div>
                <img class="card-img" src="{{ Storage::url('img/' . $post->image) }}" alt="{{ $post->image_description }}">

            </div>
        @else
            <img class="card-img" src="{{ url('img/datacenter300x300.jpg') }}" alt="sala de servidores">
        @endif

        <div class="card-title fw-semibold">{{ $post->title }}</div>
        <p class="card-text">{{ $post->content }}</p>
        <p>{{ $post->category->name }} </p>
        
       
    </article>

@endsection
