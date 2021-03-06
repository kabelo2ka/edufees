@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Donees</h1>

            @foreach($donees as $donee)
                <article>
                    <h4><a href="{{ route('donees.show', $donee->slug) }}">{{ $donee->first_name }} {{ $donee->last_name }}</a></h4>
                </article>

                <hr>
            @endforeach

            {{ $donees->links('vendor.pagination.bulma') }}
        </div>
    </section>
@endsection
