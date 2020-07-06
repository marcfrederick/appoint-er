@extends('layouts.app')

@section('content')
    <div class="container py-4">
    <h1>{{ __('category.categories') }}</h1>
    @foreach($categories as $c)
        @include('partials.body-only-card', ['link' => route('categories.show', $c), 'title' => $c->name, 'text' => $c->description])
    @endforeach
    {{ $categories->links() }}
    </div>
@endsection
