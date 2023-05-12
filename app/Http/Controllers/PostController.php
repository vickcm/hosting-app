<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function posts() {

        $posts = Post::all();
        return view('posts', [
            'posts' => $posts,
        ]);
    }

    public function view(int $id)
    {
        
        $post = Post::findOrFail($id);

        return view('posts.view', [
            'post' => $post,
        ]);
    }

    public function formNew()
    {
        return view('posts.formNew');
    }

    public function processNew(request $request) 
    {

      
        $data = $request->except(['_token']);
        $request->validate(Post::validationRules(), Post::validationMessages());

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request);
        }


        Post::create($data);
        return redirect()
            ->route('dashboard')
            ->with('message', 'Entrada creada correctamente')
            ->with('type', 'warning');
    }

    public function formEdit(int $id)
    {
        
        $post = Post::findOrFail($id);

        return view('posts.formEdit', [
            'post' => $post,
        ]);

    }

    public function processEdit(int $id, Request $request)
    {
        
        $post = Post::findOrFail($id);
        $request->validate(Post::validationRules(), Post::validationMessages());
        $data = $request->except(['_token']);

        $oldImage = null;

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request);
            $oldImage = $post->image;

        }
        $post->update($data);

        $this->deleteImage($oldImage);

        return redirect()
            ->route('dashboard')
            ->with('message', 'Entrada editada correctamente')
            ->with('type', 'warning');
    }


    public function confirmDelete(int $id)
    {
        
        $post = Post::findOrFail($id);
        return view('posts.confirmDelete', [
            'post' => $post,
        ]);
    }

    public function processDelete(int $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        $this->deleteImage($post->image);

        return redirect()
            ->route('dashboard')
            ->with('message', 'Entrada eliminada correctamente')
            ->with('type', 'success');

       
    }

    protected function uploadImage(Request $request):string
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = date('YmdHis') . Str::slug($request->title, '-') . '.' . $image->guessExtension();

        $image->storeAs('img', $imageName, 'public');

        return $imageName;

        
    }

    protected function deleteImage(?string $file):void
    {
        if ($file != null && Storage::has('img/' . $file)) {
            Storage::delete('img/' . $file);
        }   
    }

    
        
    

   
}
