@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div class="flex justify-center">
        <div class="w-full px-4 space-y-6">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">All Posts</h1>

            @forelse($posts as $post)

                <div class="bg-white w-xl shadow-md rounded-lg p-6 mb-4 border border-gray-200 hover:shadow-lg transition">
                    <div class="mb-2 text-sm text-gray-500">
                        Posted by <span class="font-semibold text-gray-700">{{ $post->user->name ?? 'Unknown' }}</span>
                    </div>
                    <h2 class="text-xl font-bold text-blue-600 mb-2">
                        <a href="/posts/{{$post->id}}">{{ $post->title }}</a>
                    </h2>
                    <br>
                    <small>By {{ $post->author->name ?? 'Unknown' }}</small>
                </div>

            @empty
                <p class="text-center text-gray-500">No posts found.</p>
            @endforelse

        </div>
    </div>
@endsection
