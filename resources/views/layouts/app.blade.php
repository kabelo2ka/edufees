<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">

            <!-- Branding Image -->
            <a class="navbar-item" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="button navbar-burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <!-- navbar items -->
                <a class="navbar-item" href="{{ route('donees.index') }}">
                    Donees
                </a>
            </div>

            <div class="navbar-end">
                <!-- navbar items -->
                @guest
                    <div class="navbar-item">
                        <div class="field is-grouped">
                            <p class="control">
                                <a class="button" href="{{ route('login') }}">
                                    <span class="icon">
                                      <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </span>
                                    <span>Login</span>
                                </a>
                            </p>
                            <p class="control">
                                <a class="button is-primary" href="{{ route('register') }}">
                                    <span class="icon">
                                      <i class="fa fa-download" aria-hidden="true"></i>
                                    </span>
                                    <span>Register</span>
                                </a>
                            </p>
                        </div>
                    </div>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ auth()->user()->first_name }}
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                Profile
                            </a>
                            <a class="navbar-item">
                                Settings
                            </a>
                            <a class="navbar-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endguest
        </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
