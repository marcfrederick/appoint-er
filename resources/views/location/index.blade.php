@extends('layouts.app')

<?php /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $locations */ ?>

@section('content')
    <div class="container py-4">
        <h1>{{ __('location.available_locations') }}</h1>
        @foreach($locations as $l)
            <div class="card mb-3 ">
                <div class="row no-gutters">
                    <div class="col-auto" style="display: flex; justify-content: center; align-items: center; overflow: hidden; width: 200px; height: 200px">
                        <img src="{{$l->images->first() !== null ? $l->images->first()->src : '//placehold.it/200'}}" alt="img of {{ $l->title }}"
                             style="min-height: 100%; min-width: 100%; object-fit: cover"/>
                    </div>
                    <div class="col">
                        <div class="card-block p-3">
                            <a href="{{ route('locations.show', $l->id) }}" class="card-title font-weight-bold ">
                                {{ $l->title }}
                                @if($l->updated_at->isCurrentWeek())
                                    <span class="badge badge-primary">{{ __('Recently updated') }}</span>
                                @endif
                            </a>
                            <p class="card-text">{{ $l->description }}</p>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        {{ $locations->links() }}
    </div>
@endsection
