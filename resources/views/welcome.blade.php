@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-primary text-light">
        <div class="container">
            <h1 class="display-4 site-logo">appoint<span class="text-danger">.</span>er</h1>
            <p class="lead">Das Terminvermittlungsportal für den modernen Alltag.</p>
        </div>
    </div>

    <div id="page-content" class="container">
        <p class="lead">
            Als Terminvermittlungsportal für den modernen Alltag ist es unsere Aufgabe Termine schnell und unkompliziert
            zu vermitteln.
            Suchen Sie nach Terminen für eine Kategorie oder einen spezifischen Anbieter und buchen Sie diesen direkt
            hier online.
        </p>

        <div class="about-us mt-5">
            <h2>Über uns</h2>
            <!-- Graphics from https://undraw.co -->
            <div class="row align-items-center text-center">
                <div class="col-sm-4 order-sm-2">
                    <img src="img/search.svg" alt="Woman with a magnifying glass" class="img-fluid">
                </div>
                <p class="col-sm-8 order-sm-1 lead">
                    Finden Sie schneller einen Termin indem Sie verschiedene Anbieter vergleichen
                </p>
            </div>
            <div class="row align-items-center text-center">
                <div class="col-sm-4 order-sm-1">
                    <img src="img/time.svg" alt="Woman sitting on the hand of a clock" class="img-fluid">
                </div>
                <p class="col-sm-8 order-sm-2 lead">
                    Sparen Sie Zeit, indem Sie Warteschleifen vermeiden
                </p>
            </div>
            <div class="row align-items-center text-center">
                <div class="col-sm-4 order-sm-2">
                    <img src="img/calendar.svg" alt="Woman standing in front of a calendar" class="img-fluid">
                </div>
                <p class="col-sm-8 order-sm-1 lead">
                    Wählen Sie einen Termin der <em>Ihnen</em> passt
                </p>
            </div>
        </div>

        <div class="testimonials mt-5">
            <h2>Testimonials</h2>

            <blockquote class="blockquote">
                <p class="mb-0">Durch <em>appoint.er</em> spart mein Sekratariat so viel Zeit, dass ich einen
                    Mitarbeiter entlassen konnte!</p>
                <footer class="blockquote-footer">Marin Aigl, Arzt</footer>
            </blockquote>

            <blockquote class="blockquote">
                <p class="mb-0">Nach wochenlanger verzwifelter Suche haben ich endlich einen Arzttermin gefunden!</p>
                <footer class="blockquote-footer">Robin Schrimpf. Student</footer>
            </blockquote>
        </div>

        <div class="offers mt-5">
            <h2>Angebote</h2>

            <div class="input-group mt-4 mb-4">
                <input type="text" class="form-control" placeholder="Suche..." aria-label="search-term"
                       aria-describedby="button-search">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="button-search">Suchen</button>
                </div>
            </div>

            <div class="card-columns">
                @foreach(App\Location::orderBy('updated_at', 'desc')->take(10)->get() as $location)
                    <div class="card">
                        <!-- TODO: Add images, probably can just use a default -->
                        <!-- <img class="card-img-top" src="images/wr1.jpeg" alt="an offer image"> -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $location->title }}</h5>
                            <p class="card-text">{{ $location->description }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a class="btn btn-outline-primary" data-toggle="modal"
                               data-target="#bookingNotImplementedModal">Termin Vereinbaren</a>
                        </div>
                    </div>
                @endforeach
            </div>
@endsection
