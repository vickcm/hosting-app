<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Author;

class PostController extends Controller
{
    public function view(int $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.view', [
            'post' => $post,
        ]);
    }
    
    public function formNew()
    {
        return view('posts.formNew', [
            'categories' => Category::all(),
            'authors' => Author::all(),
        ]);
    }

    public function processNew(request $request) 
    {
        try {
            $data = $request->except(['_token']);
            $request->validate(Post::validationRules(), Post::validationMessages());

            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request);
            }

            Post::create($data);
            return redirect()
                ->route('dashboardPosts')
                ->with('message', 'Entrada creada correctamente')
                ->with('type', 'warning');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboardPosts')
                ->with('message', 'Error al crear la entrada')
                ->with('type', 'danger');
        }
    }
    public function formEdit(int $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.formEdit', [
            'post' => $post,
            'categories' => Category::all(),
            'authors' => Author::all(),
        ]);
    }

    public function processEdit(int $id, Request $request)
    {
        try {
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
                ->route('dashboardPosts')
                ->with('message', 'Entrada editada correctamente')
                ->with('type', 'warning');

        } catch (\Exception $e) {
            return redirect()
                ->route('dashboardPosts')
                ->with('message', 'Error al editar la entrada')
                ->with('type', 'danger');
        }
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
        try {
        
            $post = Post::findOrFail($id);
            $this->deleteImage($post->image);
            $post->delete();
        
            return redirect()
                ->route('dashboardPosts')
                ->with('message', 'Entrada eliminada correctamente')
                ->with('type', 'success');
                
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboardPosts')
                ->with('message', 'Error al borrar la entrada')
                ->with('type', 'danger');
        }
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