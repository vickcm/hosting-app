<?php
/** @var \App\Models\Movie[]|\Illuminate\Database\Eloquent\Collection $movies */
/** @var \App\PaymentProviders\MercadoPagoPayment $payment */
?>
@extends('layouts.main')

@section('title', 'Ejemplo de Integración con Mercado Pago')

@push('js')
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("<?= $payment->getPublicKey();?>");
        mp.bricks().create("wallet", "mp-cobro", {
            initialization: {
                preferenceId: "<?= $payment->getPreferenceId();?>"
            }
        });
    </script>
@endpush

@section('main')
    <h1>Integración con Mercado Pago</h1>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Título</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
           
            <tr>
                <td>{{ $product->title }}</td>
                <td>$ {{ $product->price }}</td>
                <td>1</td>
                <td>$ {{ $product->price }}</td>
            </tr>
        
        </tbody>
    </table>

    <div id="mp-cobro"></div>
@endsection
