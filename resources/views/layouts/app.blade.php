<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Note App</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
<div id="app" class="">
    <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm sticky-top">
        <div class="container-fluid mx-3">
            <a class="navbar-brand" href="{{ url('/') }}">
                <p class="fw-bold fs-1 mx-auto my-auto text-white">Note App</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <a class="nav-link text-white fs-5 mx-3 fw-bold"
                           href="/allNotes/{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                            Notes
                        </a>
                    @else

                    @endif
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white fs-5 mx-3 fw-bold"
                                   href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white fs-5 mx-3 fw-bold"
                                   href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5 fw-bold" href="#"
                               role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item " href="{{ route('logout') }}"
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
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<script type="text/javascript" src="{{URL::asset('js/script.js')}}"></script>

</body>
</html>
