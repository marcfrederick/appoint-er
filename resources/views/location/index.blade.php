@extends('layouts.app')

<?php /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $locations */ ?>

@section('content')
    <div class="container py-4">
        <h1>{{ __('location.available_locations') }}</h1>
        @foreach($locations as $l)
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('locations.show', $l->id) }}" class="card-title font-weight-bold">
                        {{ $l->title }}
                        @if($l->updated_at->isCurrentWeek())
                            <span class="badge badge-primary">{{ __('location.recently_updated') }}</span>
                        @endif
                    </a>
                    <p class="card-text">{{ $l->description }}</p>
                </div>
            </div>
        @endforeach
        {{ $locations->links() }}
    </div>
@endsection
