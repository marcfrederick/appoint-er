@extends('layouts.app')

<?php /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $locations */ ?>

@section('content')
    <div class="container py-4">
        <h1>{{ __('location.available_locations') }}</h1>
        @foreach($locations as $l)
            @include('partials.body-only-card', ['link' => route('locations.show', $l->id), 'title' => $l->title, 'text' => $l->description])
        @endforeach
        {{ $locations->links() }}
    </div>
@endsection
