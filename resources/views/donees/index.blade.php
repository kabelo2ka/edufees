@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Donees</div>

                    <div class="panel-body">
                        @foreach($donees as $donee)
                            <article>
                                <h4><a href="{{ url('/donees/' . $donee->slug) }}">{{ $donee->first_name }} {{ $donee->last_name }}</a></h4>
                            </article>

                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
