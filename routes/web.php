<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\Advertisement;
use App\Models\Comment;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('/posts');
});

Route::get('/posts', function (Request $request) {
    $search = $request->query('search');
    $category = $request->query('category');

    $advertisements = Advertisement::active()->get();

    // Trending + Last Show blocks used by the Blade view
    $trending_posts = Post::query()
        ->where('is_trending', true)
        ->latest()
        ->get();

    $last_show_posts = Post::query()
        ->where('is_last_show', true)
        ->latest()
        ->get();

    if ($search) {
        $posts = Post::query()
            ->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('pages.posts.index', [
            'posts' => $posts,
            'search' => $search,
            'advertisements' => $advertisements,
            'trending_posts' => $trending_posts,
            'last_show_posts' => $last_show_posts,
        ]);
    }

    if ($category) {
        // category links are currently based on Category.name (see layouts/app.blade.php)
        $posts = Post::query()
            ->whereHas('category', function ($q) use ($category) {
                $q->where('name', $category);
            })
            ->latest()
            ->get();

        return view('pages.posts.index', [
            'posts' => $posts,
            'categorySlug' => $category,
            'advertisements' => $advertisements,
            'trending_posts' => $trending_posts,
            'last_show_posts' => $last_show_posts,
        ]);
    }

    // Default page (hero + trending + last show)
    $posts = Post::latest()->get();

    return view('pages.posts.index', [
        'posts' => $posts,
        'advertisements' => $advertisements,
        'trending_posts' => $trending_posts,
        'last_show_posts' => $last_show_posts,
    ]);
});

Route::get('/posts/{post}', function (Post $post) {
    return view('pages.posts.show', [
        'post' => $post,
        'comments' => $post->comments()->latest()->get(),
        'advertisements' => Advertisement::active()->get(),
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


Route::view('/about', 'pages.posts.about');
Route::view('/contact', 'pages.posts.contact');