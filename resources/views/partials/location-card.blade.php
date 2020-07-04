<div class="card">
    <div class="card-body">
        <a href="{{ route('locations.show', $location->id) }}" class="card-title">{{ $location->title }}</a>
        <p class="card-text">{{ $location->description }}</p>
    </div>
    <div class="card-footer text-center">
        <a class="btn btn-outline-primary" href="{{ route('locations.show', $location->id) }}">
            {{ __('partials.location_card.make_appointment') }}
        </a>
    </div>
</div>
