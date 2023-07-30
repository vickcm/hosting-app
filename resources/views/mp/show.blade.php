<?php
/**@var \App\Models\Product[] | \Iluminate\Database\Eloquent\Collection $products*/
/**@var \MercadoPago\Preference $preference */
/**@var string $publicKey */
?>
@extends('layouts.main')

@section('title', 'Mercado Pago')

@push('js')
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("<?= $publicKey;?>");
        mp.bricks().create("wallet", "mp-cobro", {
            initialization: {
                preferenceId: "<?= $preference->id;?>",
            },
        });
    </script>
@endpush

@section('main')
    <h1>Mercado Pago</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->title}}</td>
                <td>$ {{$product->price}}</td>
                <td>1</td>
                <td>$ {{$product->price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div id="mp-cobro"></div>
@endsection