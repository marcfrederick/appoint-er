@extends('layouts.app')

<?php
/**
 * @var \App\Location $location
 * @var \App\Slot $slot
 * @var string $message
 */
?>

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirm booking') }}</div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('bookings.store', ['location' => $location, 'slot' => $slot]) }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    {{ __('Location') }}
                                </div>
                                <div class="col-md-6">
                                    {{ $location->title }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    {{ __('Start') }}
                                </div>

                                <div class="col-md-6">
                                    {{ $slot->start }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    {{ __('Duration') }}
                                </div>

                                <div class="col-md-6">
                                    {{ $slot->duration }}
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Book') }}
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
