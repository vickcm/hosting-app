

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
            <p>Acá iría una imagen diciendo que no hay imagen.</p>
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
  

