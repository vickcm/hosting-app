<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts */
?>
@section('title', 'Blog')

@extends('layouts.main')

@section('main')
<section  class="section-blog">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-3 mt-3 blog">Nuestro Blog de Noticias</h1>
        </div>
        @include('posts._allpost-data')
    </div>
</section>
@endsection