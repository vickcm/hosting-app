@extends('layouts.main')

@section('title', __('Server Error'))
@section('main')
@include('errors._contentError')
@endsection
