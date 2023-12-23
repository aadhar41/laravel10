<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'title') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <div
            class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">
            <h5 class="my-0 mr-md-auto font-weight-normal">
                Laravel App
            </h5>
            <nav class="my-2 my-md-0 mr-md-3 ms-auto">
                <a class="p-2 text-dark" href="{{ route('home.index') }}">Home</a>
                <a class="p-2 text-dark" href="{{ route('home.contact') }}">Contact</a>
                <a class="p-2 text-dark" href="{{ route('posts.index') }}">Blog Posts</a>
                <a class="p-2 text-dark" href="{{ route('posts.create') }}">Add Blog Posts</a>
            </nav>
        </div>
        <main class="py-4">
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('status') }}</strong>
                    </div>
                @endif
                @if ($errors->any())
                    <ul class="list-group mb-2">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">
                                <strong>{{ $error }}</strong>
                            </li>
                        @endforeach
                    </ul>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
