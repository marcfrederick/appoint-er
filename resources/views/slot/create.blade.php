@extends('layouts.app')

<?php /** @var string $message */ ?>

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('slot.new_slot') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('slots.store', ['location' => $location]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">
                                    {{ __('slot.date') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="date" type="date"
                                           class="form-control @error('date') is-invalid @enderror" name="date"
                                           value="{{ old('date') }}" placeholder="{{ now()->format('Y-m-d') }}" required
                                           autocomplete="date" autofocus>
                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time" class="col-md-4 col-form-label text-md-right">
                                    {{ __('slot.time') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="time" type="time"
                                           class="form-control @error('time') is-invalid @enderror" name="time"
                                           value="{{ old('time') }}" placeholder="{{ now()->format('H:i') }}" required
                                           autocomplete="time" autofocus>
                                    @error('time')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duration"
                                       class="col-md-4 col-form-label text-md-right">{{ __('slot.duration') }}</label>

                                <div class="col-md-6">
                                    <input id="duration" type="number"
                                           class="form-control @error('duration') is-invalid @enderror" name="duration"
                                           value="{{ old('duration') }}" placeholder="90" required
                                           autocomplete="duration" autofocus>

                                    @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('slot.create') }}
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
