@extends('layouts.app')

<?php /** @var \App\Location[] $locations */ ?>

@section('content')
    <div class="jumbotron jumbotron-fluid bg-primary text-light">
        <div class="container">
            <h1 class="display-4 site-logo">appoint<span class="text-danger">.</span>er</h1>
            <p class="lead">{{ __('index.slogan') }}</p>
        </div>
    </div>

    <div id="page-content" class="container">
        <div class="float-right">
            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-hashtags="appointer"
               data-dnt="true" data-show-count="false">Tweet</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>

        <p class="lead">{{ __('index.mission') }}</p>

        <div class="about-us mt-5">
            <h2>{{ __('index.about_us.title') }}</h2>
            <!-- Graphics from https://undraw.co -->
            <div class="row align-items-center text-center">
                <div class="col-sm-4 order-sm-2">
                    <img src="img/search.svg" alt="Woman with a magnifying glass" class="img-fluid">
                </div>
                <p class="col-sm-8 order-sm-1 lead">
                    {{ __('index.about_us.feat_compare') }}
                </p>
            </div>
            <div class="row align-items-center text-center">
                <div class="col-sm-4 order-sm-1">
                    <img src="img/time.svg" alt="Woman sitting on the hand of a clock" class="img-fluid">
                </div>
                <p class="col-sm-8 order-sm-2 lead">
                    {{ __('index.about_us.feat_save_time') }}
                </p>
            </div>
            <div class="row align-items-center text-center">
                <div class="col-sm-4 order-sm-2">
                    <img src="img/calendar.svg" alt="Woman standing in front of a calendar" class="img-fluid">
                </div>
                <p class="col-sm-8 order-sm-1 lead">
                    {{ __('index.about_us.feat_choose_freely') }}
                </p>
            </div>
        </div>

        <div class="testimonials mt-5">
            <h2>{{ __('index.testimonials.title') }}</h2>

            <blockquote class="blockquote">
                <p class="mb-0">{{ __('index.testimonials.aigl') }}</p>
                <footer class="blockquote-footer">Marin Aigl, Arzt</footer>
            </blockquote>

            <blockquote class="blockquote">
                <p class="mb-0">{{ __('index.testimonials.schrimpf') }}</p>
                <footer class="blockquote-footer">Robin Schrimpf, Student</footer>
            </blockquote>
        </div>

        <div class="offers mt-5">
            <h2>{{ __('index.offers.title') }}</h2>

            <div class="input-group mt-4 mb-4">
                <input id="ajax-search" type="text" class="form-control" placeholder="Suche..." aria-label="search-term"
                       aria-describedby="button-search">
                <div class="input-group-append">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Wählen Sie eine Kategorie
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" type="button" id="button-search">Suchen</button>
                </div>
            </div>

            <div id="ajax-search-results" class="card-columns">
                @each('partials.location-card', $locations, 'location')
            </div>
        </div>
    </div>



@endsection
