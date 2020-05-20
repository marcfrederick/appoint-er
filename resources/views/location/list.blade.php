@extends('layouts.app')

<?php /** @var \App\Location[] $locations */ ?>

@section('content')
    <div class="container py-4">
        <h1>{{ __('Available Locations') }}</h1>
        <ul>
            @foreach($locations as $l)
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('locations', $l->id) }}" class="card-title font-weight-bold">
                            {{ $l->title }}
                            @if($l->updated_at->isCurrentWeek())
                                <span class="badge badge-primary">{{ __('Recently updated') }}</span>
                            @endif
                        </a>
                        <p class="card-text">{{ $l->description }}</p>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
@endsection
