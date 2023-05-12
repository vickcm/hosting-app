@extends('layouts.admin')

@section('title', __('No encontrado'))
@section('code', 'La página no fue encontrada pero te invitamos a seguir navegando por nuestro sitio.')


@section('abm-post')

<p>
    La solicitud no pudo procesarse. 
</p>

<a href="{{ route('dashboard') }}" role="button" class="btn btn-success">
    Ir al Administrador
</a>
@endsection