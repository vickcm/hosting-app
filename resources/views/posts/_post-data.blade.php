<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts
 * 
 * use _ to indicate that this is a partial view
 */
/* 
echo '<pre>';
print_r ($post);
echo '</pre>';
 */
?>
<h2 class="text-center titulo-admin">Vista Previa de la Entrada 
  <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg>
</h2>
<article class="row justify-content-center h-100 mt-5">
    <div class="col-md-8">
      <div class="card">
        <div class="row no-gutters">
          <div class="col-md-5">
            @if($post->image !== null && Storage::has('img/' . $post->image))
            <div>
                <img class="card-img" src="{{ Storage::url('img/' . $post->image) }}" alt="{{ $post->image_description }}">
    
            </div>
        @else
            <p>Acá iría una imagen diciendo que no hay imagen. </p>
        @endif
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="card-title">{{$post->title}}</div>
              <p class="card-text">{{$post->content}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</article>
<div class="d-flex justify-content-center mt-3">
  <a href="{{ route('dashboardPosts') }}" class="btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/></svg>
    Volver al Panel de Administracion
  </a>
</div>