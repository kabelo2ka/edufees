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

<section class="hero is-primary is-medium is-bold" style="background: url({{ asset('images/header-image.jpg') }})">
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <!-- Branding Image -->
                    <a class="navbar-item" href="{{ url('/') }}">
                        <i class="fa fa-graduation-cap"></i>&nbsp;
                        <strong>{{ config('app.name', 'Edufees') }}</strong>
                    </a>
                    <span class="navbar-burger" data-target="navbarMenu">
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
                                    <a class="button is-white is-outlined" href="{{ route('login') }}">
                                        <span class="icon">
                                            <i class="fa fa-sign-in"></i>
                                        </span>
                                        <span>Login</span>
                                    </a>
                                    <a class="button is-success" href="{{ route('register') }}">
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

<div class="box">
    <p class="has-text-centered">
        <strong class="tag is-primary">Master Plan</strong> 50(rands) * 500(donors) = R25 000 (Varsity Fee)
    </p>
</div>

<section class="container">
    <div class="columns">
        <div class="column is-4">
            <div class="card">
                <div class="card-image has-text-centered">
                    <i class="fa fa-id-card-o"></i>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4 class="has-text-centered">Register as a donee</h4>
                        <p>Whether living alone on the streets or with a parent who earns just enough to pay for food and little else, you can still go to school.</p>
                        <p>
                            <a class="button is-success is-outlined is-small" href="{{ route('register') }}">
                                <strong>Register now</strong>
                            </a>
                             Or <a href="#">Learn more</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-4">
            <div class="card">
                <div class="card-image has-text-centered">
                    <i class="fa fa-heart has-text-danger"></i>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4 class="has-text-centered">Get a donation</h4>
                        <p>Choose your course and your target fees amount. <br>Donors will choose who to donate for.</p>
                        <p><a href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-4">
            <div class="card">
                <div class="card-image has-text-centered">
                    <i class="fa fa-graduation-cap"></i>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4 class="has-text-centered">Go to school</h4>
                        <p>Once the target school fees is reached, we do the registering process for you. We pay your fees and monitor your performance throught the year.</p>
                        <p><a href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="column is-8 is-offset-2 has-text-centered">
        <h2 class="title">How Donors can help</h2><br>
        <p class="subtitle">Make a donation to make a difference.</p>
        <a class="button is-large is-danger" href="{{ route('donation.create') }}">
            <span class="icon">
              <i class="fa fa-heart"></i>
            </span>
            <span>Donate</span>
        </a>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>Edufees &copy; 2018</p>
            <p><i class="fa fa-graduation-cap"></i></p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
