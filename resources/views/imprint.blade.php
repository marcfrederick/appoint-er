@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1>{{ __('imprint.title') }}</h1>
        <div class="lead">
            {{ __('imprint.according_to') }}
        </div>

        <p>
            Max Muster<br>
            Musterweg<br>
            12345 Musterstadt<br>
        </p>

        <p>
            {{ __('imprint.contact') }}:<br>
            {{ __('imprint.phone') }}: <a href="tel:+49-1234-789456">01234-789456</a><br>
            {{ __('imprint.email') }}: <a href="mailto:max@muster.de">max@muster.de</a><br>
        </p>
    </div>
@endsection
