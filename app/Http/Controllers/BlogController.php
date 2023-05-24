<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function indexBlog()
    {
        $posts = Post::with(['category', 'author'])->get(); // soluciona query n+1

        return view('posts', [
            'posts' => $posts,
        ]);
    }

    public function viewFullPost(int $id)
    {

        $post = Post::findOrFail($id);

        return view('posts.fullpost', [
            'post' => $post,
        ]);
    }
}
