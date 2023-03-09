<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css') }}">

    <style>
        body{
            background: url("{{ asset('bg-main.jpg') }}") no-repeat;
            background-size: 100%;
            -moz-background-size: 100%;
            -o-background-size: 100%;
            -webkit-background-size: 100%;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/cover.css') }}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('dist/img/favicon.ico') }}">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto mb-lg-5">
        <div>
            <h3 class="float-md-start mb-0">Hyper Calendar</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                @auth()
                    <a class="nav-link" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a class="nav-link" href="{{ url('login') }}">{{ __('Login') }}</a>
                    <a class="nav-link" href="{{ url('register') }}">{{ __('Register') }}</a>
                @endauth
            </nav>
        </div>
    </header>

  @yield('content')

    <footer class="mt-auto text-white-50">
        <p>Hyper Calendar by <a href="https://hyper-sys.com" class="text-white" target="_blank">Hyper System</a></p>
    </footer>
</div>



</body>
</html>
