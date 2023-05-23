<?php
/** @var \App\Models\Posts[]|\Illuminate\Database\Eloquent\Collection $posts */

use Illuminate\Support\Str;
?>



<div class="col-12">
    <h2 class="text-dark my-4">Últimas entradas</h2>
</div>
@foreach ($posts as $post)
<div class="col-12 col-md-4">
    <div class="card mt-3">
        <div class="card-body">
            <h3 class="card-title" > {{ $post->title }} </h3>
            <p class="card-text">{{ Str::words($post->content, 30) }}</p>
            <a href="{{ route('posts.fullpost', ['id' => $post->id]) }}" class="btn btn-entradas">Ver más</a>
        </div>
    </div>
</div>
@endforeach