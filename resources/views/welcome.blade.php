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

<section class="hero is-primary is-medium is-bold">
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <!-- Branding Image -->
                    <a class="navbar-item" href="{{ url('/') }}">
                        <strong>{{ config('app.name', 'Edufees') }}</strong>
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenu">
              <span></span>
              <span></span>
              <span></span>
            </span>
                </div>
                <div id="navbarMenu" class="navbar-menu">
                    <div class="navbar-end">
                        <a href="{{ route('donees.index') }}" class="navbar-item">
                            Donees
                        </a>
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <span class="navbar-item">
                            <div class="field is-grouped">
                                <p class="control">
                                    <a class="button is-white is-outlined is-small" href="{{ route('login') }}">
                                        <span class="icon">
                                            <i class="fa fa-sign-in"></i>
                                        </span>
                                        <span>Login</span>
                                    </a>
                                    <a class="button is-info is-small" href="{{ route('register') }}">
                                        <span class="icon">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </span>
                                        <span>Register</span>
                                    </a>
                                </p>
                            </div>
                         </span>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
                Want to further your education, <br>but no money for fees?
            </h1>
            <h2 class="subtitle">
                Don't worry, <strong>Edufees</strong> and donors have you covered. <a href="{{ route('login') }}"> Register</a> and create a <strong>Donee</strong> account.
            </h2>
        </div>
    </div>

</section>

<div class="box cta">
    <p class="has-text-centered">
        <span class="tag is-primary">New</span> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
        ut aliquip ex ea commodo consequat.
    </p>
</div>

<section class="container">
    <div class="columns features">
        <div class="column is-4">
            <div class="card">
                <div class="card-image has-text-centered">
                    <i class="fa fa-paw"></i>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4>Tristique senectus et netus et. </h4>
                        <p>Purus semper eget duis at tellus at urna condimentum mattis. Non blandit massa enim nec.
                            Integer enim neque volutpat ac tincidunt vitae semper quis. Accumsan tortor posuere ac ut
                            consequat semper viverra nam.</p>
                        <p><a href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-4">
            <div class="card">
                <div class="card-image has-text-centered">
                    <i class="fa fa-id-card-o"></i>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4>Tempor orci dapibus ultrices in.</h4>
                        <p>Ut venenatis tellus in metus vulputate. Amet consectetur adipiscing elit pellentesque. Sed
                            arcu non odio euismod lacinia at quis risus. Faucibus turpis in eu mi bibendum neque egestas
                            cmonsu songue. Phasellus vestibulum lorem sed risus.</p>
                        <p><a href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-4">
            <div class="card">
                <div class="card-image has-text-centered">
                    <i class="fa fa-rocket"></i>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4> Leo integer malesuada nunc vel risus. </h4>
                        <p>Imperdiet dui accumsan sit amet nulla facilisi morbi. Fusce ut placerat orci nulla
                            pellentesque dignissim enim. Libero id faucibus nisl tincidunt eget nullam. Commodo viverra
                            maecenas accumsan lacus vel facilisis.</p>
                        <p><a href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="intro column is-8 is-offset-2">
        <h2 class="title">Perfect for developers or designers!</h2><br>
        <p class="subtitle">Vel fringilla est ullamcorper eget nulla facilisi. Nulla facilisi nullam vehicula ipsum a.
            Neque egestas congue quisque egestas diam in arcu cursus.</p>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>
                <strong>Bulma Templates</strong> by <a href="https://github.com/dansup">Daniel Supernault</a>. The
                source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>.
            </p>
            <p>
                <a class="icon" href="https://github.com/dansup/bulma-templates">
                    <i class="fa fa-github"></i>
                </a>
            </p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
