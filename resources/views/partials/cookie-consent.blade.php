<div id="cookie-consent" style="display: none" class="fixed-bottom jumbotron">
    <h2>{{ __('partials.cookie_consent.title') }}</h2>
    <p>{!! __('partials.cookie_consent.body', ['url' => route('privacy-policy')]) !!}</p>
    <div id="cookie-consent-accept" class="btn btn-primary btn-md">{{ __('partials.cookie_consent.accept') }}</div>
</div>
