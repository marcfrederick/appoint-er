@extends('layouts.app')

<?php /** @var \App\User $user */ ?>

@section('content')
    <div class="container py-4">
        <h1>{{ $user->name }} <small class="text-muted">{{  $user->email }}</small></h1>

        @if($user->locations->isNotEmpty())
            <h2>{{ __('Listings by this user') }}</h2>
            <ul>
                @foreach($user->locations as $location)
                    <li>{{ $location }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
