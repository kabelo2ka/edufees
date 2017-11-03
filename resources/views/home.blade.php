@extends('layouts.app')

@section('content')
    <section class="hero is-medium is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <div class="column is-one-third is-left">
                    <h1 class="title">
                        Hello, {{ auth()->user()->first_name }}.
                    </h1>
                    <h2 class="subtitle">
                        I hope you are having a great day!
                    </h2>
                </div>
                <div class="column">

                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

                <div class="tile is-ancestor has-text-centered">
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">Continue as a Donee</p>
                            <p class="subtitle">I need money for school fees.</p>
                            <p class="field">
                                <a class="button is-medium is-primary is-block-mobile">
                                    <span class="icon">
                                      <i class="fa fa-graduation-cap"></i>
                                    </span>
                                    <span>Go</span>
                                </a>
                            </p>
                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">Continue as a Donee</p>
                            <p class="subtitle">I have money to help.</p>
                            <a class="button is-medium is-danger is-block-mobile">
                                    <span class="icon">
                                      <i class="fa fa-heart"></i>
                                    </span>
                                <span>Go</span>
                            </a>
                        </article>
                    </div>
                </div>

        </div>
    </section>
@endsection
