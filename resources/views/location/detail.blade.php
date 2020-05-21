@extends('layouts.app')

<?php /** @var \App\Location $location */ ?>

@section('content')
    <div class="container py-4">
        @can('manage-location', $location)
            <div class="text-right">
                <form action="{{ route('locations.destroy', $location->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" data-confirm="Are you sure?">
                        Delete
                    </button>
                </form>
            </div>
        @endcan

        <h1 class="display-4">{{ $location->title  }}</h1>
        <p class="lead">{{ $location->description }}</p>

        <h2>Owner</h2>
        <ul class="list-unstyled">
            <li><a href="{{ route('users.detail', $location->user) }}">{{ $location->user->name }}</a></li>
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
