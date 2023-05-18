<div class="row">
    <h2 class="text-dark my-4">Últimas entradas</h2>
    @foreach ($posts as $post)
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" > {{ $post->title }} </h5>
                <p class="card-text">{{ $post->getShortContent($post->content, 100) }}</p>
                <a href="#" class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </div>
    @endforeach
</div>