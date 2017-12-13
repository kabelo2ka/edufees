@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">
                {{ $user->first_name }} {{ $user->last_name }}
            </h1>

            <table class="table">
                <tbody>
                    <tr>
                        <td>Fullname:</td>
                        <td>{{ $user->getFullname() }}</td>
                    </tr>
                    <tr>
                        <td>Date of Birth:</td>
                        <td>{{ $user->doneeProfile->dob }}</td>
                    </tr>
                    <tr>
                        <td>Phone numbers:</td>
                        <td>{{ $user->doneeProfile->phone_number }}</td>
                    </tr>
                    <tr>
                        <td>Email address:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>


            <h2 class="title is-3">Course Overview</h2>

            <table class="table">
                <tbody>
                <tr>
                    <td>Name:</td>
                    <td>Film Arts</td>
                </tr>
                <tr>
                    <td>Institution name:</td>
                    <td>The Open Window</td>
                </tr>
                <tr>
                    <td>Campus name:</td>
                    <td>Centurion</td>
                </tr>
                <tr>
                    <td>Qualification:</td>
                    <td>Degree in Film Arts</td>
                </tr>
                <tr>
                    <td>Duration:</td>
                    <td>3 years</td>
                </tr>
                <tr>
                    <td>Year of Study:</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Fee (Target Amount):</td>
                    <td>R65 000</td>
                </tr>
                <tr>
                    <td>Outstanding Fee:</td>
                    <td>R27 650</td>
                </tr>
                <tr>
                    <td>Career and Educational Goals:</td>
                    <td></td>
                </tr>
                </tbody>
            </table>


            <p class="field">
                <a href="{{ route('donation.create', ['donee' => $user->slug]) }}"
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
