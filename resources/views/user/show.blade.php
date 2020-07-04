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

        @if($user->isCurrent() && $user->bookings->isNotEmpty())
            <h2>{{ __('My Bookings') }}</h2>
            <table class="table table-striped">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Duration</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->bookings as $booking)
                    <tr>
                        <td>{{ date_format(date_create($booking->slot->start), 'Y-m-d') }}</td>
                        <td>{{ date_format(date_create($booking->slot->start), 'H:i') }}</td>
                        <td>{{ $booking->slot->duration }} {{ __('minutes') }}</td>
                        <td class="float-right"><a
                                href="#"
                                class="btn btn-danger">{{ __('Cancel Booking') }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <ul>
            </ul>
        @endif

        <h2>@if($user->isCurrent()){{ __('My listings') }}@else{{ __('Listings by this user') }}@endif</h2>
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
