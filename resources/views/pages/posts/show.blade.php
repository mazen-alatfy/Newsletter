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
@endsection
