@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns is-mobile is-centered">
                <div class="column is-half is-narrow">
                    <h1 class="title">Login</h1>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}"
                                       name="email" placeholder="Enter your email..." value="{{ old('email') }}"
                                       required autofocus>
                                <span class="icon is-small is-left">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <span class="icon is-small is-right">
                                    <i class="fa {{ $errors->has('email') ? 'fa-warning' : 'fa-check' }}"></i>
                                </span>
                            </div>
                            @if ($errors->has('email'))
                                <p class="help is-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="password"
                                       class="input {{ $errors->has('password') ? 'is-danger' : '' }}"
                                       placeholder="Enter your password..." name="password" required>
                                <span class="icon is-small is-left">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <span class="icon is-small is-right">
                                    <i class="fa {{ $errors->has('password') ? 'fa-warning' : 'fa-check' }}"></i>
                                </span>
                            </div>
                            @if ($errors->has('password'))
                                <p class="help is-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div class="field">
                            <div class="control">
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-link">Login</button>
                            </div>
                            <div class="control" href="{{ route('password.request') }}">
                                <a class="button is-text">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
