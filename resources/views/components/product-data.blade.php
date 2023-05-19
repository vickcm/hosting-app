<?php
/** @var \App\Models\Product[]|\Illuminate\Database\Eloquent\Collection $products */
/* echo '<pre>';
print_r($product);
echo '</pre>'; 
 */
?>
<div class="col-12">
    <h2 class="mb-3 mt-3 mt-md-5 text-center">Servicios de Hosting</h2>
</div>
<div class="col-12">
    <div class="row justify-content-center">
        @foreach ($products as $product)
        <div class="col-md-4" style="width: 18rem;"> 
            <div class="productos mt-3">
                <div class="mt-2">
                    <img class="img-fluid" alt="servicio de hosting" src="{{ url('img/hosting.png') }}">
                    <h3 class=""> {{ $product->title }} </h3>
                    <p class="mb-2 text-muted">{{ $product->subtitle }}</p>
                    <p class="">{{ $product->description }}</p>
                    <button class="btn btn-hostin">Consultar</button>
                </div>
            </div>
        </div>
        @endforeach
    </div> 
</div>