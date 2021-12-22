<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    $posts = Post::latest();
    if (request('search')) {
        $posts
            ->where('title', 'like', '%' .request('search'). '%')
        ->orWhere('title', 'like', '%' .request('search'). '%');
    }

    return view('posts', [
        'posts' => $posts->get(),
        'categories' => Category::all()
    ]); 
})->name('home');

// Post::where('slug', $post)->first();
Route::get('posts/{post:slug}', function(Post $post) {
    //find a post by its slug and pass it to a view called "post" 
    return view('post', ['post' => $post]);
});
 
Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
});