@extends('layouts.app')

<?php /** @var \App\Location $location */ ?>

@section('content')
    <div class="container py-4">
        @canany(['delete', 'update'], $location)
            <div class="text-right">
                @can('update', $location)
                    <a class="btn btn-secondary" href="{{ route('locations.edit', $location) }}">{{ __('Edit') }}</a>
                    <a class="btn btn-secondary" href="{{ route('slots.create', ['location' => $location]) }}">
                        {{ __('location.add_slot') }}
                    </a>
                @endcan
                @can('delete', $location)
                    <form action="{{ route('locations.destroy', $location) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger confirmable" type="submit"
                                data-confirm="{{ __('location.are_you_sure') }}">
                            {{ __('location.delete') }}
                        </button>
                    </form>
                @endcan
            </div>
        @endcanany

        @if($location->images->first() !== null)
            <img src="{{$location->images->first()->src }}"
                 alt="img of {{ $location->title }}" style="width: 400px"/>
            @endif


            <h1 class="display-4">{{ $location->title  }}</h1>
            <p class="lead">{{ $location->description }}</p>

        @isCurrentUser($location->user)
            <h2>{{ __('location.my_bookings') }}</h2>
            @if(!$location->futureBookedSlots->isEmpty())
                <table class="table table-striped">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ __('location.date') }}</th>
                        <th scope="col">{{ __('location.time') }}</th>
                        <th scope="col">{{ __('location.duration') }}</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($location->futureBookedSlots as $slot)
                            <tr>
                                <td>{{ date_format(date_create($slot->start), 'Y-m-d') }}</td>
                                <td>{{ date_format(date_create($slot->start), 'H:i') }}</td>
                                <td>{{ $slot->duration }} {{ trans_choice('location.minute', $slot->duration) }}</td>
                                <td class="float-right">
                                    <form class="form-inline" method="POST"
                                          action="{{ route('slots.destroy', ['location' => $location, 'slot' => $slot]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger">{{ __('location.slot_remove') }}</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">
                    {{ __('location.no_bookings') }}
                </div>
            @endif
        @endif

        <h2>{{ trans_choice('location.slot', $location->futureAvailableSlots->count()) }}</h2>
        @if($location->futureAvailableSlots->isNotEmpty())
            <table class="table table-striped">
                <thead class="thead-light">
                <tr>
                    <th scope="col">{{ __('location.date') }}</th>
                    <th scope="col">{{ __('location.time') }}</th>
                    <th scope="col">{{ __('location.duration') }}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($location->futureAvailableSlots as $slot)
                    @empty($slot->booking)
                        <tr>
                            <td>{{ date_format(date_create($slot->start), 'Y-m-d') }}</td>
                            <td>{{ date_format(date_create($slot->start), 'H:i') }}</td>
                            <td>{{ $slot->duration }} {{ trans_choice('location.minute', $slot->duration) }}</td>
                            <td class="float-right">
                                @isCurrentUser($location->user)
                                    <form class="form-inline" method="POST"
                                          action="{{ route('slots.destroy', ['location' => $location, 'slot' => $slot]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger">{{ __('location.slot_remove') }}</button>
                                    </form>
                                @else
                                    <a href="{{ route('bookings.create', ['location' => $location, 'slot' => $slot]) }}"
                                       class="btn btn-primary">{{ __('location.book') }}</a>
                                @endif
                            </td>
                        </tr>
                    @endempty
                @endforeach
                </tbody>
            </table>
            @else
                <div class="alert alert-info">
                    {{ __('location.no_slots') }}
                </div>
            @endif

        <h2>{{ __('location.owner') }}</h2>
        <ul class="list-unstyled">
            <li><a href="{{ route('users.show', $location->user) }}">{{ $location->user->name }}</a></li>
            <li>{{ $location->user->email }}</li>
        </ul>

        <h2>{{ __('location.address') }}</h2>
        <ul class="list-unstyled">
            <li>{{ $location->address->street }}</li>
            <li>{{ $location->address->city }}</li>
            <li>{{ $location->address->postcode }}</li>
            <li>{{ $location->address->country }}</li>
        </ul>

        <h2>{{ trans_choice('location.category', $location->categories->count()) }}</h2>
        @foreach( $location->categories as $cat)
            <a class="badge badge-primary" href="{{ route('categories.show', $cat) }}">{{ $cat->name }}</a>
        @endforeach
    </div>
@endsection
