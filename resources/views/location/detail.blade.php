@extends('layouts.app')

<?php /** @var \App\Location $location */ ?>

@section('content')
    <div class="container py-4">
        @can('manage-location', $location)
            <div class="text-right">
                <a class="btn btn-danger confirmable" href="{{ route('locations.delete', $location->id) }}"
                   role="button" data-confirm="Are you sure you want to delete this location?">Delete</a>
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
