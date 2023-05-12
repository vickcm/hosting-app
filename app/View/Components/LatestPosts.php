<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Post;

class LatestPosts extends Component
{
    /**
     * Create a new component instance.
     */

    public $posts;
    public function __construct()
    {
        if (Post::count() > 3) {
            $this->posts = Post::latest()->take(3)->get();
        }
        else {
            $this->posts = Post::all();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.latest-posts');
    }
}
