@extends('layouts.app')

<?php /** @var string $message */ ?>

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Location') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('locations.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ old('title') }}" required autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text"
                                              class="form-control @error('description') is-invalid @enderror"
                                              name="description" required
                                              autocomplete="description">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Street') }}</label>

                                <div class="col-md-6">
                                    <input id="street" type="text"
                                           class="form-control @error('street') is-invalid @enderror" name="street"
                                           value="{{ old('street') }}" required autocomplete="street">

                                    @error('street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postcode"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                                <div class="col-md-6">
                                    <input id="postcode" type="text"
                                           class="form-control @error('postcode') is-invalid @enderror" name="postcode"
                                           value="{{ old('postcode') }}" required autocomplete="postcode">

                                    @error('postcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city"
                                       class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text"
                                           class="form-control @error('city') is-invalid @enderror"
                                           name="city" value="{{ old('city') }}" required autocomplete="city">

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">

                                    <select id="country" type="text"
                                            class="form-control @error('country') is-invalid @enderror" name="country"
                                            required autocomplete="country">
                                        @foreach($countryCodes as $code => $name)
                                            <option value="{{ $code }}">{{ $name }}</option>
                                        @endforeach
                                    </select>

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Create') }}
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
