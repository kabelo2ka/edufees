@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">{{ $donee->first_name }} {{ $donee->last_name }} <a href="#" class="button is-primary is-pulled-right" >Donate Now</a></h1>
            
            <table class="table">
                <tbody>
                    <tr>
                        <td>First name</td>
                        <td>{{ $donee->first_name }}</td>
                    </tr>
                    <tr>
                        <td>Second name</td>
                        <td>{{ $donee->second_name }}</td>
                    </tr>
                    <tr>
                        <td>Last name</td>
                        <td>{{ $donee->last_name }}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>{{ $donee->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone Numbers</td>
                        <td>{{ $donee->phone_number }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
