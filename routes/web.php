<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\File;

// ExPost.php
// Route::get('/', function () {
//     // return Post::find('first-post');
//     return view('posts', [
//         'posts' => Post::allPosts()
//     ]);
//     // ddd($posts[0]->title);      
// });

// Route::get('posts/{post}', function($slug) {
//     //find a post by its slug and pass it ti a view called "post" 
//     return view('post', ['post' => Post::findorFail($slug)]);
// });


Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->get()
    ]); 
});
// Post::where('slug', $post)->first();
Route::get('posts/{post:slug}', function(Post $post) {

    //find a post by its slug and pass it to a view called "post" 
    return view('post', ['post' => $post]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});