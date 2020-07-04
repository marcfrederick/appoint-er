@extends('layouts.app')

<?php /** @var \App\Location $location */ ?>

@section('content')
    <div class="container py-4">
        @canany(['delete', 'update'], $location)
            <div class="text-right">
                @can('update', $location)
                    <a class="btn btn-secondary" href="{{ route('locations.edit', $location) }}">{{ __('Edit') }}</a>
                    <a class="btn btn-secondary" href="{{ route('slots.create', ['location' => $location]) }}">
                        {{ __('Add Slot') }}
                    </a>
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

        <h2>{{ __('Available Slots') }}</h2>
        @if($location->futureAvailableSlots()->isNotEmpty())
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
                @foreach($location->futureAvailableSlots() as $slot)
                    @empty($slot->booking)
                        <tr>
                            <td>{{ date_format(date_create($slot->start), 'Y-m-d') }}</td>
                            <td>{{ date_format(date_create($slot->start), 'H:i') }}</td>
                            <td>{{ $slot->duration }} {{ __('minutes') }}</td>
                            <td class="float-right"><a
                                    href="{{ route('bookings.create', ['location' => $location, 'slot' => $slot]) }}"
                                    class="btn btn-primary">{{ __('Book') }}</a></td>
                        </tr>
                    @endempty
                @endforeach
                </tbody>
            </table>
        @else
            No available slots.
        @endif

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
        <p> {{$location->user->name}}</p>
        <h2>
            @if(count($location->categories) === 0)
            @elseif(count($location->categories) === 1) Category
            @else Categories
            @endif
        </h2>
        <ul class="list-unstyled">
            @foreach( $location->categories as $cat)
                <li>{{$cat->name}}</li>
            @endforeach
        </ul>
    </div>
@endsection
