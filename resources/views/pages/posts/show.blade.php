@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="max-w-4xl mx-auto mt-10 px-4">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                {{ $post->title }}
            </h2>

            <div class="prose max-w-none mb-6">
                {!! Str::markdown($post->content) !!}
            </div>

            <div class="text-sm text-gray-600 space-y-1 border-t pt-4">
                <p>
                    <span class="font-medium">Category:</span>
                    {{ $post->category->name ?? 'Uncategorized' }}
                </p>
                <p>
                    <span class="font-medium">Author:</span>
                    {{ $post->author->name ?? 'Unknown' }}
                </p>
            </div>
        </div>
    </div>
    <div class="mt-4">
                <h3 class="text-lg font-semibold mb-2">Comments</h3>

                    @forelse($comments as $comment)
                        @if($comment->is_active)
                            <div class="bg-gray-100 border-l-4 border-gray-500 text-gray-700 p-3 mb-2">
                                <p>{{ $comment->content }}</p>
                            </div>
                        @endif
                        @empty
                            <p class="text-gray-400">No comments available.</p>
                    @endforelse
            </div>

                       
                    @if(session('success'))
                        <p class="text-green-600 mt-4">{{ session('success') }}</p>
                    @endif

                        
                            <div class="mt-6">
                                <h3 class="text-lg font-semibold mb-2">Add a Comment</h3>
                                        <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mb-6">
                                            @csrf
                                            <textarea name="content" rows="4" class="w-full p-2 border border-gray-300 rounded" placeholder="Write your comment here..." required></textarea>
                                            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Add Comment</button>
                                        </form>
                            </div>

@endsection
