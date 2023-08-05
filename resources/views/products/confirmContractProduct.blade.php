@extends('layouts.main')
@section('main')
<div class="div-confirm-product mt-5">
    <h1 class="fs-2 text-center blog visually-hidden">Confirmar Reserva</h1>
    <p class="text-center titulo-admin fw-bold">Estás a punto de reservar el siguiente producto:</p>
    <h2 class="text-center">{{ $product->title }}</h2>
    <p>{{ $product->description }}</p>
    <form action="{{ route('mp.contratacion-mp', $product->product_id) }}" method="GET" class="d-flex justify-content-center">
        @csrf
        <button type="submit" class="btn btn-hostin">Pagar Con Mercado Pago</button>
    </form>
    <p class="form-aclaracion text-center mt-3">Recibirás con un mail con las indicaciones para finalizar el proceso de reserva</p>
</div>
@endsection