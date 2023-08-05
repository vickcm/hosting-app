<?php
/** @var \App\Models\Movie[]|\Illuminate\Database\Eloquent\Collection $product */
/** @var \App\PaymentProviders\MercadoPagoPayment $payment */
?>
@extends('layouts.main')

@section('title', 'Contratación :: Nube web')

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
    <h1 class="text-center mt-5">Estas por contratar el servicio de hosting: <span class="titulo-admin">{{ $product->title }}</span></h1>
    <p class="text-center p-color">Seras redirigido a mercado pago</p>
    <div class="client-table mt-5">
        <div class="table-responsive">
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
        </div>
    </div>
@endsection