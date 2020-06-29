@extends('layouts.app')

<?php /** @var \App\Location $location */ ?>

@section('content')
    <div class="container py-4">
        @canany(['delete', 'update'], $location)
            <div class="text-right">
                @can('update', $location)
                    <a class="btn btn-secondary" href="{{ route('locations.edit', $location) }}">{{ __('Edit') }}</a>
                @endcan
                @can('delete', $location)
                    <form action="{{ route('locations.destroy', $location) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger confirmable" type="submit" data-confirm="Are you sure?">
                            {{ __('Delete') }}
                        </button>
                    </form>
                @endcan
            </div>
        @endcanany

        <h1 class="display-4">{{ $location->title  }}</h1>
        <p class="lead">{{ $location->description }}</p>

        <h2>Owner</h2>
        <ul class="list-unstyled">
            <li><a href="{{ route('users.show', $location->user) }}">{{ $location->user->name }}</a></li>
            <li>{{ $location->user->email }}</li>
        </ul>

        <h2>Address</h2>
        <ul class="list-unstyled">
            <li>{{ $location->address->street }}</li>
            <li>{{ $location->address->city }}</li>
            <li>{{ $location->address->postcode }}</li>
            <li>{{ $location->address->country }}</li>
        </ul>
    </div>
@endsection
