<?php
/** @var \App\Models\Post $post */

?>

@extends('layouts.admin')

@section('title', 'Detalle de '. $post->title)


@section('abm-post')

 @include('posts._post-data')
    
       
@endsection