<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.posts.index', ['posts' => Post::latest()->get()]);
});

Route::get('/posts/{post}', function (Post $post) {
    return view('pages.posts.show', ['post' => $post]);
});
