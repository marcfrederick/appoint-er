@extends("layouts.app")

@section("content")
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('contact.contact_us') }}</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">{{ __('contact.email') }}</div>
                            <div class="col-md-6">
                                <a href="mailto:admin@htwg-konstanz.de">admin@htwg-konstanz.de</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">{{ __('contact.phone') }}</div>
                            <div class="col-md-6"><a href="tel:+49-1234-789456">+49 123 456789</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
