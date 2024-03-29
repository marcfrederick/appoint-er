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
            <h2>{{ __('user.my_bookings') }}</h2>
            <table class="table table-striped">
                <thead class="thead-light">
                <tr>
                    <th scope="col">{{ __('user.location') }}</th>
                    <th scope="col">{{ __('user.date') }}</th>
                    <th scope="col">{{ __('user.time') }}</th>
                    <th scope="col">{{ __('user.duration') }}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->bookings as $booking)
                    <tr>
                        <td class="font-weight-bold">
                            <a href="{{ route('locations.show', $booking->slot->location) }}">{{ $booking->slot->location->title }}</a>
                        </td>
                        <td>{{ date_format(date_create($booking->slot->start), 'Y-m-d') }}</td>
                        <td>{{ date_format(date_create($booking->slot->start), 'H:i') }}</td>
                        <td>{{ $booking->slot->duration }} {{ trans_choice('user.minute', $booking->slot->duration) }}</td>
                        <td class="float-right">
                            <form method="POST"
                                action="{{ route('bookings.destroy', [$booking->slot->location, $booking->slot, $booking]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger confirmable"
                                        data-confirm="{{ __('user.cancel_confirmation') }}">
                                    {{ __('user.cancel') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <ul>
            </ul>
        @endif

        <h2>{{ $user->isCurrent() ? __('user.my_listings') : __('user.listings') }}</h2>
        @if($user->locations->isNotEmpty())
            <div class="card-columns">
                @each('partials.location-card', $user->locations, 'location')
            </div>
        @else
            <div class="alert alert-info">
                {{ __('user.no_listings') }}
            </div>
        @endif
    </div>
@endsection
