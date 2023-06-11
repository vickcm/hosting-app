<?php
/** @var \App\Models\Posts[]|\Illuminate\Database\Eloquent\Collection $posts */
use Illuminate\Support\Str;
?>
<div class="col-12">
    <h2 class="text-dark my-4">Últimas entradas</h2>
</div>
<ul class="col-12 d-md-flex">
@foreach ($posts as $post)
<li class="card mt-3 me-2">
    <div class="card-body">
        <h3 class="card-title" > {{ $post->title }} </h3>
        <p class="card-text">{{ Str::words($post->content, 30) }}</p>
        <a href="{{ route('posts.fullpost', ['id' => $post->id]) }}" class="btn btn-entradas">Ver más</a>
    </div>
</li>
@endforeach
</ul>