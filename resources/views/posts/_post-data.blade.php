<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts

 */
?>

<article class="row justify-content-center h-100 mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    @if ($post->image !== null && Storage::has('img/' . $post->image))
                        <div>
                            <img class="card-img" src="{{ Storage::url('img/' . $post->image) }}"
                                alt="{{ $post->image_description }}">

                        </div>
                    @else
                        <img class="card-img" src="{{ url('img/datacenter300x300.jpg') }}" alt="sala de servidores">
                    @endif
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="card-title text-end">Categoría: {{ $post->category->name }}, por
                            {{ $post->author->name }}
                        </div>
                        <h2 class="card-title fw-semibold"> {{ $post->title }}</h2>
                        <p class="card-text">{{ $post->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<div class="d-flex justify-content-center mt-3">
    <a href="{{ route('dashboardPosts') }}" class="btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
        Volver al Panel de Administración
    </a>
</div>
