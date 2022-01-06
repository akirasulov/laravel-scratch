<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author'])
            )->paginate(3)->withQueryString()
        ]); 
    }

    public function show(Post $post) {
        //find a post by its slug and pass it to a view called "post" 
        return view('posts.show', ['post' => $post]);
    }
}
