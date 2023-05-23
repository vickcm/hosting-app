@extends('layouts.main')

@section('title', __('Too Many Requests'))
@section('main')
@include('errors._contentError')
@endsection
