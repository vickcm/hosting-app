<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class AdminController extends Controller
{
    public function indexPosts()
    {

        $posts = Post::all();


        return view('admin-views.posts-table', [
            'posts' => $posts,
        ]);
    }

    public function indexCategories()
    {

        $categories = Category::all();


        return view('admin-views.categories-table', [
            'categories' => $categories,
        ]);
    }
}
