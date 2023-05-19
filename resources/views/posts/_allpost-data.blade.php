<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts
 *
 * use _ to indicate that this is a partial view
 */
?>
<div class="row section-blog">
@foreach ($posts as $post)
    <div class="col-md-4 mt-3 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="fw-medium text-secondary mb-2">
                    {{ $post->category->name }}
                </div>
                <h5 class="card-title" > {{ $post->title }} </h5>
                <p class="card-text">{{ $post->getShortContent($post->content, 100) }}</p>
                <a href="#" class="btn btn-entradas float-end">Ver más</a>
            </div>
        </div>
    </div>
@endforeach
</div>
{{-- <div class="card">
    <div>
        imagen
    </div>
    <div class="card-title"> {{$post->title}} </div>
    <div class="card-body"> {{$post->content}} </div>
</div>
--}}