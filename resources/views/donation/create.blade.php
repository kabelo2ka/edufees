@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">
                Make a deference
            </h1>

            <form action="">
                <div class="field">
                    <label class="label">Select a donee</label>
                    <div class="control">
                        <div class="select">
                            <select name="donee" required autofocus>
                                <option>Please select...</option>
                                @foreach($donees as $donee)
                                    <option value="{{ $donee->slug }}">{{ $donee->getFullName(true) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Donation amount (Rands)</label>
                    <div class="control has-icons-left has-icons-right">
                        <input type="text" class="input {{ $errors->has('gross_amount') ? 'is-danger' : '' }}"
                               name="gross_amount" value="{{ old('gross_amount') | '50' }}" required>
                        <span class="icon is-small is-left">
                            <i class="fa fa-heart"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('gross_amount') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('gross_amount'))
                        <p class="help is-danger">{{ $errors->first('gross_amount') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Comment</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Any message to the donor?" rows="2"></textarea>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox">
                            Donate anonymously?</a>
                        </label>
                    </div>
                </div>

                <div class="field">
                    <a class="button is-danger">
                        <span class="icon">
                          <i class="fa fa-heart"></i>
                        </span>
                        <span>Donate Now</span>
                    </a>
                </div>
            </form>

        </div>
    </section>
@endsection
