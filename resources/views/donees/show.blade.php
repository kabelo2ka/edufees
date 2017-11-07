@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">
                {{ $donee->first_name }} {{ $donee->last_name }}
            </h1>

            <table class="table">
                <tbody>
                <tr>
                    <td>Full name:</td>
                    <td>{{ $donee->first_name }} {{ $donee->second_name }} {{ $donee->last_name }}</td>
                </tr>
                <tr>
                    <td>Phone Numbers:</td>
                    <td>{{ $donee->phone_number }}</td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td>{{ $donee->email }}</td>
                </tr>
                </tbody>
            </table>

            <p class="field">
                <a href="{{ route('donation.create', ['donee' => $donee->slug]) }}"
                   class="button is-medium is-danger is-block-mobile">
                    <span class="icon">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span>Donate Now</span>
                </a>
            </p>

        </div>
    </section>
@endsection
