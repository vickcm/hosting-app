<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts */

?>

@section('title', 'Últimas entradas')

@extends('layouts.main')

@section('main')

    <h1 class="mb-3">Ultimas Entradas</h1>
    @include('posts._allpost-data')

@endsection