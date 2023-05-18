<?php
/** @var \App\Models\Product[]|\Illuminate\Database\Eloquent\Collection $products */
/* echo '<pre>';
print_r($product);
echo '</pre>'; 
 */
?>
<section>
    <h2 class="mb-3">Productos</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $product->title }} </h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $product->subtitle }}</h6>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="#" class="btn btn-primary">Conoce más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div> 
</section>