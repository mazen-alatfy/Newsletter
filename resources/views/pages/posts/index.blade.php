@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])


@section('content')
@if(isset($search) && $search)
  <section class="search-results">
    <div class="container">
      <div class="category-header">
        <h1 class="section-title">Search results for: {{ $search ?? '' }}</h1>
        <a href="/posts" class="back-home-btn view-all">Clear Search</a>
      </div>
        <div class="posts-grid">
        @forelse($posts as $post)
        <div class="card">
          <img src="{{ $post->cover_image ? asset('storage/' . $post->cover_image) : 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $post->title }}">
          <div class="card-content">
            <h3>{{ $post->title }}</h3>
            <p>{!! Str::limit(strip_tags($post->content), 150) !!}</p>
            <a href="/posts/{{ $post->id }}">اقرأ المزيد</a>
          </div>
        </div>
        @empty
        <p class="no-posts">No posts found for your search.</p>
        @endforelse
      </div>
    </div>
  </section>
@elseif(!empty($categorySlug))
  <section class="category-posts">
    <div class="container">
      <div class="category-header">
        <h1 class="section-title"> {{ ucfirst($categorySlug) }} Posts </h1>
        <a href="/posts" class="back-home-btn view-all">Back to Home</a>
      </div>
        <div class="posts-grid">
        @forelse($posts as $post)
        <div class="card">
          <img src="{{ $post->cover_image ? asset('storage/' . $post->cover_image) : 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $post->title }}">
          <div class="card-content">
            <h3>{{ $post->title }}</h3>
            <p>{!! Str::limit(strip_tags($post->content), 150) !!}</p>
            <a href="/posts/{{ $post->id }}">اقرأ المزيد</a>
          </div>
        </div>
        @empty
        <p class="no-posts">No posts found in this category.</p>
        @endforelse
      </div>
    </div>
  </section>
@else
  <section class="hero">
    <div class="container">
      <div class="hero-box">
        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=80" alt="">
        <div class="hero-content">
          <h1>كيف تحافظ على صحتك يومياً بخطوات بسيطة وفعالة</h1>
          <p>دليل سريع للعادات الصحية، التغذية الجيدة، والنشاط البدني لتحسين جودة حياتك كل يوم.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="trending">
    <div class="container">
      <h2 class="section-title">Trending</h2>
        <div class="trending-grid">
@forelse($trending_posts as $post)
        <div class="card">
            <img src="{{ $post->cover_image ? asset('storage/' . $post->cover_image) : 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $post->title }}">
            <div class="card-content">
                <h3>{{ $post->title }}</h3>
                <p>{!! Str::limit(strip_tags($post->content), 150) !!}</p>
                <a href="/posts/{{ $post->id }}">اقرأ المزيد</a>
            </div>
        </div>
        @empty
        <p class="no-posts">No trending posts.</p>
        @endforelse
      </div>
    </div>
  </section>

  <section class="last-show">
    <div class="container">
      <h2 class="section-title">Last Show</h2>
      <div class="trending-grid">
@forelse($last_show_posts as $post)

        <div class="card">
            <img src="{{ $post->cover_image ? asset('storage/' . $post->cover_image) : 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $post->title }}">
            <div class="card-content">
                <h3>{{ $post->title }}</h3>
                <p>{!! Str::limit(strip_tags($post->content), 150) !!}</p>
                <a href="/posts/{{ $post->id }}">اقرأ المزيد</a>
            </div>
        </div>
        @empty
        <p class="no-posts">No last show posts.</p>
        @endforelse
      </div>
    </div>
  </section>


@endif

  <section class="advertisement">
    <div class="container">
      <div class="ad-box">
        @foreach ($advertisements->where('placement', 'bottom') as $advertisement)
          <div class="ad-item">
            @if($advertisement->image)
              <a href="{{ $advertisement->link }}" target="_blank">
                <img src="{{ asset('storage/' . $advertisement->image) }}" alt="Ad Image" class="w-full h-40 object-cover rounded-md">
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
    </div>
  </section>
@endsection

