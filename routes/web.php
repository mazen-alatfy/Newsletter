<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\Advertisement;
use App\Models\Comment;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('pages.posts.index', [
         'posts' => Post::latest()->get(),
                'advertisements' => Advertisement::latest()->get(),
                'comments' => Comment::where('is_active', 1)->latest()->get(),
        
    ]);
});

Route::get('/posts/{post}', function (Post $post) {
    return view('pages.posts.show', [
      'post' => $post,
      'comments' => $post->comments()->latest()->get(),
              'advertisements' => Advertisement::latest()->get(),
              
    ]);
});
Route::post('/posts/{post}/comments', function (Request $request, Post $post) {
    
    $validated = $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    Comment::create([
        'post_id' => $post->id,
        'user_id' => optional($request->user())->id,
        'content' => $validated['content']              ,
        'is_active' => 1, 
    ]);
    return back()->with('success', 'Your comment has been added!');
        })->name('comments.store'); 