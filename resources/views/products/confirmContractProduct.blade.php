@extends('layouts.main')

@section('main')

<div>
    <h2>Confirmar Contratación</h2>
    <p>Estás a punto de contratar el siguiente producto:</p>
    <h3>{{ $product->title }}</h3>
    <p>{{ $product->description }}</p>

    <form action="{{ route('products.processContractProduct', $product->product_id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-hostin">Confirmar Contratación</button>
    </form>
</div>

@endsection

