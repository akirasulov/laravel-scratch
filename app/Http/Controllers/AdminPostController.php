<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AdminPostController extends Controller
{
    public function admin() {
        return view('admin.posts.index', [
            'posts' => Post::paginate(20)
        ]);
    }
}
