@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1>{{ __('contact.requests') }}</h1>

        <div class="card-group">
            @foreach($requests as $request)
                <div class="card mb-3">
                    <div class="card-header">{{ $request->title }}</div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ $request->message }}</p>
                            <footer class="blockquote-footer">
                                @isset($request->user)<a href="{{ route('users.show', $request->user) }}">{{ $request->user->name }}</a>@else{{ __('contact.anonymous_user') }}@endisset, {{ $request->updated_at }}
                            </footer>
                        </blockquote>
                    </div>
                    @isset($request->user)
                        <div class="card-footer">
                            <a class="btn btn-primary" href="mailto:{{ $request->user->email }}">{{ __('contact.reply') }}</a>
                        </div>
                    @endisset
                </div>
            @endforeach
        </div>

        {{ $requests->links() }}
    </div>
@endsection
