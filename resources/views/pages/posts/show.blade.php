@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('title', $post->title)

@section('content')
<div class="post-page">
  <div class="post-layout">

    @if($post->doctor_name)
      <aside class="post-sidebar">
        <div class="post-doctor">
          <img
            src="{{ $post->doctor_image ? asset('storage/' . $post->doctor_image) : 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&auto=format&fit=crop&w=80&h=80&q=80&crop=face' }}"
            alt="{{ $post->doctor_name }}"
          >

          <div class="post-doctor-name">
            {{ $post->doctor_name }}
          </div>

          <div class="post-doctor-date">
            @if ($post->published_at)
              {{ $post->published_at->format('M d, Y') }}
            @else
              {{ $post->created_at->format('M d, Y') }}
            @endif
          </div>
        </div>
      </aside>
    @else
      <div></div>
    @endif

    <div class="post-main">
      @if($post->image )
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
             class="w-full h-96 object-cover rounded-lg mb-6">
      @endif
      <h1 class="post-title">{{ $post->title }}</h1>

      <div class="post-content">
        {!! Str::markdown($post->content) !!}
      </div>

      <div class="post-actions">
        <a href="/posts" class="back-btn">← Back to Posts</a>
      </div>

      <div class="comments-section">
        <h2>Comments ({{ $comments->where('is_active', true)->count() }})</h2>

        <div class="comments-list">
          @forelse($comments->where('is_active', true) as $comment)
            <div class="comment-item">
              <p>{{ $comment->content }}</p>
            </div>
          @empty
            <p>No comments yet. Be the first!</p>
          @endforelse
        </div>

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('comments.store', $post->id) }}" method="POST" class="comment-form">
          @csrf
          <textarea
            name="content"
            rows="4"
            placeholder="Add your comment..."
            required
            class="form-input"
          ></textarea>

          <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
      </div>

      {{-- Bottom Ads --}}
      @php
        $bottomAds = $advertisements->where('placement', 'bottom');
      @endphp
      @if($bottomAds->count())
      <section class="advertisement advertisement-bottom">
        <div class="ad-box">
          @foreach ($bottomAds as $advertisement)
            <div class="ad-item">
              @if($advertisement->image)
                <a href="{{ $advertisement->link }}" target="_blank">
                  <img src="{{ asset('storage/' . $advertisement->image) }}" alt="Ad Image">
                </a>
              @endif
              @if($advertisement->video)
                <video controls class="ad-video">
                  <source src="{{ asset('storage/' . $advertisement->video) }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              @endif
            </div>
          @endforeach
        </div>
      </section>
      @endif
    </div>

    {{-- Sidebar Ads --}}
    @php
      $sidebarAds = $advertisements->where('placement', 'sidebar');
    @endphp
    @if($sidebarAds->count())
    <aside class="ad-sidebar">
      <div class="ad-sidebar-inner">
        @foreach ($sidebarAds as $advertisement)
          <div class="ad-item">
            @if($advertisement->image)
              <a href="{{ $advertisement->link }}" target="_blank">
                <img src="{{ asset('storage/' . $advertisement->image) }}" alt="Ad Image">
              </a>
            @endif
            @if($advertisement->video)
              <video controls class="ad-video">
                <source src="{{ asset('storage/' . $advertisement->video) }}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            @endif
          </div>
        @endforeach
      </div>
    </aside>
    @endif

  </div>
</div>
@endsection

