@extends('layouts.app')

<?php /** @var \App\User $user */ ?>

@section('content')
    <div class="container py-4">
        <h1>{{ $user->name }} <small class="text-muted">{{  $user->email }}</small></h1>

        <h2>{{ __('Listings by this user') }}</h2>
        @if($user->locations->isNotEmpty())
            <div class="card-columns">
                @each('partials.location-card', $user->locations, 'location')
            </div>
        @else
            <div class="alert alert-info">
                {{ __('No listings by this user') }}
            </div>
        @endif
    </div>
@endsection
