@extends('layouts.main')

@section('title', __('Service Unavailable'))
@section('main')
@include('errors._contentError')
@endsection
