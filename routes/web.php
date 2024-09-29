<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Muhammad Abhyasa Santoso'], ['title' => 'About']);
});

Route::get('/posts', function () {
    //Uncomment for manual N + 1 problem solution    

    //$posts = Post::with(['author', 'category'])->latest()->get();

    //$posts = Post::latest()->get();

    //return view('posts', ['title' => 'Blog', 'posts' => $posts]);

    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(12)->withQueryString()]);
});

Route::get('/posts/{post:slug}', function(Post $post) {

    // $post = Post::find($id);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user) {

    //Uncomment for manual N + 1 problem solution

    //$posts =$user->posts->load('category','author');

    //return view('posts', ['title' => count($posts) . ' Articles by: ' . $user->name, 'posts' => $posts]);

    return view('posts', ['title' => count($user->posts) . ' Articles by: ' . $user->name, 'posts' => $user->posts]);

});

Route::get('/categories/{category:slug}', function(Category $category) {
    
    //Uncomment for manual N + 1 problem solution

    //$posts =$category->posts->load('category','author');

    //return view('posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $posts]);

    return view('posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $category->posts]);

});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});