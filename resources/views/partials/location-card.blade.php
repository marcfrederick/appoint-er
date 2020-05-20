<div class="card">
    <!-- TODO: Add images, probably can just use a default -->
    <!-- <img class="card-img-top" src="images/wr1.jpeg" alt="an offer image"> -->
    <div class="card-body">
        <a href="{{ route('locations.detail', $location->id) }}" class="card-title">{{ $location->title }}</a>
        <p class="card-text">{{ $location->description }}</p>
    </div>
    <div class="card-footer text-center">
        <a class="btn btn-outline-primary" data-toggle="modal"
           data-target="#bookingNotImplementedModal">Termin Vereinbaren</a>
    </div>
</div>
