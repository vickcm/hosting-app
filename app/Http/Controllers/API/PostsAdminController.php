<?php
namespace App\Http\Controllers\API;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsAdminController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 0,
            'data' => Post::all()
        ]);
    }

    // retorna un post en particular
    public function view($id)
    {
        return response()->json([
            'status' => 0,
            'data' => Post::findorFail($id)
        ]);
    }

    // crea un post
    public function createPost(Request $request)
    {
        $validatedData = $request->validate(Post::validationRules(), Post::validationMessages());
        Post::create($validatedData);

        return response()->json([
            'status' => 0,
        ]);
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::findorFail($id);
        $validatedData = $request->validate(Post::validationRules(), Post::validationMessages());
        $post->update($validatedData);

        return response()->json([
            'status' => 0,
        ]);
    }

    public function updatePartialPost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        
        // Aplicar las reglas de validación para la solicitud PATCH
        $validatedData = $request->validate(Post::updateValidationRules());
        $post->update($validatedData);

        return response()->json([
            'status' => 0,
        ]);
    }

    public function deletePost($id)
    {
        $post = Post::findorFail($id);
        $post->delete();

        return response()->json([
            'status' => 0,
        ]);
    }
}