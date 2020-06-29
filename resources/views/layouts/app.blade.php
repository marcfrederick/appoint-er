<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'appoint.er') }}</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    @include('partials.header')

    @if(!empty(Session::get('toasts')))
        <div aria-live="polite" aria-atomic="true" style="position: relative;">
            <div style="position: absolute; top: 1em; right: 1em;">
                @foreach(Session::pull('toasts') as $toast)
                    <div class="toast" data-autohide="false">
                        <div class="toast-header">
                            <strong class="mr-auto text-primary">Info</strong>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                        </div>
                        <div class="toast-body">
                            {{ $toast }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</div>
@include('partials.cookie-consent')
</body>

</html>
