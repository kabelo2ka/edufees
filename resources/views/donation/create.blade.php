@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Donate</h1>
            <h2 class="subtitle">You're about to do something incredible...</h2>

            <form action="">
                {{ csrf_field() }}
                <div class="field">
                    <label class="label">Select a donee</label>
                    <div class="control has-icons-left">
                        <div class="select">
                            <select name="donee" required autofocus>
                                <option>Please select...</option>
                                @foreach($donees as $donee)
                                    @php
                                        $selected = $donee->slug === request('donee') ? 'selected':'';
                                    @endphp
                                    <option value="{{ $donee->slug }}" {{ $selected }}>{{ $donee->getFullName(true) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="icon is-left">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Donation amount (Rands)</label>
                    <div class="control has-icons-left has-icons-right">
                        <input type="text" class="input {{ $errors->has('gross_amount') ? 'is-danger' : '' }}"
                               name="gross_amount" value="{{ old('gross_amount') | '50' }}" required>
                        <span class="icon is-small is-left">
                            <i class="fa fa-heart has-text-danger"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('gross_amount') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('gross_amount'))
                        <p class="help is-danger">{{ $errors->first('gross_amount') }}</p>
                    @endif
                </div>

                <p class="field">
                    <div class="tabs is-toggle is-fullwidth is-large">
                        <ul>
                            <li>
                                <a>
                                    <span class="icon"><i class="fa fa-credit-card"></i></span>
                                    <span>Donate via Credit Card</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="icon"><i class="fa fa-paypal"></i></span>
                                    <span>Paypal</span>
                                </a>
                            </li>
                        </ul>
                    </div>



                </p>

                <div class="field">
                    <label class="label">Comment</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Any message to the donee?" rows="2"></textarea>
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
                        <span>Continue donation</span>
                    </a>
                </div>
            </form>

            <br><br><br>
            <form action="{{ route('payment.stripe.store') }}" method="POST">
                {{ csrf_field() }}
                <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_RfqxLRc75xq8KsbyOCJxIbUq"
                        data-amount="999"
                        data-name="Edufees"
                        data-description="Widget"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-zip-code="true">

                </script>
            </form>

        </div>
    </section>
@endsection
