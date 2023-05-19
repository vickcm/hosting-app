<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts */
?>
@section('title', 'Blog')

@extends('layouts.main')

@section('main')
    <h1 class="mb-3 mt-3 text-center blog">Nuestro Blog de Noticias</h1>
    @include('posts._allpost-data')
@endsection