@extends('layouts.app')

<?php /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $users */ ?>

@section('content')
    <div class="container py-4">
        <h1>{{ __('user.user') }}</h1>

        <ul>
            @foreach($users as $user)
                <li><a href="{{ route('users.show', $user) }}">{{ $user->email }}</a></li>
            @endforeach
        </ul>
        {{ $users->links() }}
    </div>
@endsection
