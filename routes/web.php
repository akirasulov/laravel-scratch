<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    // return Post::find('first-post');
    return view('posts', [
        'posts' => Post::allPosts()
    ]);
    // ddd($posts[0]->title);      
});

Route::get('posts/{post}', function($slug) {
    //find a post by its slug and pass it ti a view called "post" 
    return view('post', ['post' => Post::findorFail($slug)]);
});
