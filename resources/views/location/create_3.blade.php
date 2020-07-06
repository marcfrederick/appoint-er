@extends('layouts.app')

<?php /** @var string $message */ ?>

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('location.location_confirm') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('locations.store') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">{{ __('location.title') }}</div>
                                <div class="col-md-6">{{ $title }}</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">{{ __('location.description') }}</div>
                                <div class="col-md-6">{{ $description }}</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">{{ __('location.street') }}</div>
                                <div class="col-md-6">{{ $street }}</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">{{ __('location.city') }}</div>
                                <div class="col-md-6">{{ $city }}</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">{{ __('location.postcode') }}</div>
                                <div class="col-md-6">{{ $postcode }}</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">{{ __('location.country') }}</div>
                                <div class="col-md-6">{{ $country }}</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">{{ trans_choice('location.category', 1) }}</div>
                                <div class="col-md-6">{{ $category }}</div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('location.confirm') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
