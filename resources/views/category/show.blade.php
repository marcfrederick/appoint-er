@extends('layouts.app')

<?php
/** @var \App\Category $category */
$locations = $category->locations()->paginate()
?>

@section('content')
    <div class="container py-4">
        @can('update', $category)
            <div class="text-right">
                <a class="btn btn-secondary" href="{{ route('categories.edit', $category) }}">
                    {{ __('category.edit') }}
                </a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger confirmable"
                            data-confirm="{{ __('category.are_you_sure') }}">{{ __('category.delete') }}
                    </button>
                </form>
            </div>
        @endcan

        <h1>{{ __('category.locations_in_category', ['name' => $category->name]) }}</h1>
        <p class="lead">{{ $category->description }}</p>
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
