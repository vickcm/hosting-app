@extends('layouts.main')

@section('title', __('No encontrado'))
@section('code', 'La página no fue encontrada pero te invitamos a seguir navegando por nuestro sitio.')


@section('main')

<p>
    Página no encontrada.
</p>

<a href="{{ route('home') }}" role="button" class="btn btn-success">
    Ir al Sitio Web 
</a>
@endsection