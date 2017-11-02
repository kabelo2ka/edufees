@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        Profile of <strong>{{ $donee->first_name }} {{ $donee->last_name }}</strong>
                        <a href="#" class="btn btn-primary pull-right">Donate</a>
                    </div>

                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>First name: {{ $donee->first_name }}</li>
                            <li>Second name: {{ $donee->second_name }}</li>
                            <li>Last name: {{ $donee->last_name }}</li>
                            <li>Email Address: {{ $donee->email }}</li>
                            <li>Phone Numbers: {{ $donee->phone_number }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
