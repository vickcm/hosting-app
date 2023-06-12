@extends('layouts.main')
@section('main')
<div class="div-confirm-product mt-5">
    <h1 class="fs-2 text-center blog">Confirmar Contratación</h1>
    <p class="text-center">Estás a punto de contratar el siguiente producto:</p>
    <h2 class="text-center">{{ $product->title }}</h2>
    <p>{{ $product->description }}</p>
    <form action="{{ route('products.processContractProduct', $product->product_id) }}" method="POST" class="d-flex justify-content-center">
        @csrf
        <button type="submit" class="btn btn-hostin">Confirmar Contratación</button>
    </form>
</div>
@endsection