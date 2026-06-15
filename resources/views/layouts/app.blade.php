<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'healthNato')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-gray-100 text-gray-900">
       <header class="site-header">
    <div class="container">
      <div class="logo"><a href="{{ url('/') }}" translate="no">HealthNato</a></div>

      <nav class="main-nav flex items-center">
        <ul class="nav-list">
  <li><a href="/posts?category=General Health">General Health</a></li>
  <li><a href="/posts?category=nutrition">Nutrition</a></li>
  <li><a href="/posts?category=Dermacare">Dermacare</a></li>
  <li><a href="/posts?category=Pharmaceuticals">Pharmaceuticals</a></li>
  <li><a href="/posts?category=Herbs">Herbs</a></li>
  <li><a href="/posts?category=fitness">Fitness</a></li>
</ul>
        <form action="/posts" method="GET" class="search-form">
            <input
                type="text"
                name="search"
                placeholder="Search posts..."
                value="{{ request('search') }}"
                class="search-input"
            >

            <button type="submit" class="search-btn">
                Search
            </button>
            </form>
      </nav>
    </div>
  </header>

        <main class="container mx-auto p-4">
            @yield('content')
        </main>

       <footer class="site-footer">
          <div class="container">
            <div class="footer-logo" translate="no">
              <img
                src="{{ asset('image/WhatsApp Image 2026-05-16 at 2.15.52 AM.jpeg') }}"
                alt="Health Nato"
                loading="lazy"
                class="footer-logo-img"
              />
            </div>
            <div class="footer-content">
               <a href="/about">About</a>
               <a href="/contact">Contact</a>
            </div>




          </div>
        </footer>

        @vite('resources/js/app.js')
    </body>
</html>
