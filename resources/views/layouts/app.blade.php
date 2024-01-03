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

    <style>
        .ribbon {
            width: 60px;
            font-size: 14px;
            padding: 4px;
            position: absolute;
            right: -25px;
            top: -12px;
            text-align: center;
            border-radius: 25px;
            transform: rotate(20deg);
            background-color: #ff9800;
            color: white;
        }

        #app>div>nav>a {
            text-decoration: none !important;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">

        <div
            class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">
            <h5 class="my-0 mr-md-auto font-weight-normal">
                Laravel App
            </h5>
            <nav class="my-2 my-md-0 mr-md-3 ms-auto">
                <a class="p-2 text-dark" href="{{ route('home') }}">{{ __('Home') }}</a>
                <a class="p-2 text-dark" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                <a class="p-2 text-dark" href="{{ route('posts.index') }}">{{ __('Blog Posts') }}</a>
                <a class="p-2 text-dark" href="{{ route('posts.create') }}">{{ __('Add Blog Posts') }}</a>
                @guest
                    @if (Route::has('register'))
                        <a class="p-2 text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    @if (Route::has('login'))
                        <a class="p-2 text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                @else
                    <a class="p-2 text-dark" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <span class="badge bg-primary mx-2 px-3 py-2">
                        @auth
                            {{ auth()->user()->name }}
                        @endauth
                    </span>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
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
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
