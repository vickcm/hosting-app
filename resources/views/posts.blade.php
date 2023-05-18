<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts */

?>

@section('title', 'Blog')

@extends('layouts.main')

@section('main')

    <h1 class="mb-3">Nuestro Blog de noticias</h1>
    @include('posts._allpost-data')

@endsection