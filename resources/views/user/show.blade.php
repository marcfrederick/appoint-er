@extends('layouts.app')

<?php /** @var \App\User $user */ ?>

@section('content')
    <div class="container py-4">
        @canany(['delete', 'update'], $user)
            <div class="text-right">
                @can('delete', $user)
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger confirmable" type="submit" data-confirm="Are you sure?">
                            Delete
                        </button>
                    </form>
                @endcan
            </div>
        @endcanany

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
