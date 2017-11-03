@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns is-mobile is-centered">
                <div class="column is-half is-narrow">
                    <h1 class="title">Register</h1>
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <label class="label">First name</label>
                                        <div class="control has-icons-right">
                                            <input type="text" class="input {{ $errors->has('first_name') ? 'is-danger' : '' }}" name="first_name" placeholder="First name" value="{{ old('first_name') }}" required autofocus>
                                            <span class="icon is-small is-right">
                                                <i class="fa {{ $errors->has('first_name') ? 'fa-warning' : 'fa-check' }}"></i>
                                            </span>
                                        </div>
                                        @if ($errors->has('first_name'))
                                            <p class="help is-danger">{{ $errors->first('first_name') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="column">
                                    <label class="label">Last name</label>
                                    <div class="control has-icons-right">
                                        <input type="text" class="input {{ $errors->has('last_name') ? 'is-danger' : '' }}" name="last_name" placeholder="Last name" value="{{ old('last_name') }}" required>
                                        <span class="icon is-small is-right">
                                            <i class="fa {{ $errors->has('last_name') ? 'fa-warning' : 'fa-check' }}"></i>
                                        </span>
                                    </div>
                                    @if ($errors->has('last_name'))
                                        <p class="help is-danger">{{ $errors->first('last_name') }}</p>
                                    @endif
                                </div>
                            </div>




                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}"
                                       name="email" placeholder="Enter your email." value="{{ old('email') }}"
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
                                       placeholder="Enter your password." name="password" required>
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
                            <label class="label">Confirm Password</label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="password"
                                       class="input {{ $errors->has('password') ? 'is-danger' : '' }}"
                                       placeholder="Confirm your password." name="password_confirmation" required>
                                <span class="icon is-small is-left">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <span class="icon is-small is-right">
                                    <i class="fa {{ $errors->has('password') ? 'fa-warning' : 'fa-check' }}"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-link">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
