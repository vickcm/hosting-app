<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts
 *
 * use _ to indicate that this is a partial view
 * 
 */
use Illuminate\Support\Str;
?>
@foreach ($posts as $post)
    <div class="col-12 col-md-4 mt-3 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="fw-medium text-secondary mb-2">
                    {{ $post->category->name }}
                </div>
                <h2 class="card-title" > {{ $post->title }} </h2>
                <div class="fw-medium text-secondary mb-2">Autor:
                    {{ $post->author->name }}
                </div>
                <p class="card-text">{{ Str::words($post->content, 30) }}</p>
                <a href="{{ route('posts.fullpost', ['id' => $post->id]) }}" class="btn btn-entradas float-end">Ver más</a>
            </div>
        </div>
    </div>
@endforeach
{{-- <div class="card">
    <div>
        imagen
    </div>
    <div class="card-title"> {{$post->title}} </div>
    <div class="card-body"> {{$post->content}} </div>
</div>
--}}