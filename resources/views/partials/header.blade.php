<header id="page-header" class="page-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a href="{{ url('/') }}" class="navbar-brand">
            appoint<span class="text-danger">.</span>er
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('locations.index') }}">{{ __('partials.header.locations') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">{{ __('partials.header.categories') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li>
                    <form action="{{ route('locations.search') }}" method="GET" class="input-group">
                        <input id="query" name="query" type="text" class="form-control"
                               placeholder="{{ __('partials.header.search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text">{{ __('partials.header.search') }}</button>
                        </div>
                    </form>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('partials.header.login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('partials.header.register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                {{ __('partials.header.profile') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('locations.create_1') }}">
                                <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                {{ __('partials.header.new_location') }}
                            </a>

                            @can('create', \App\Category::class)
                                <a class="dropdown-item" href="{{ route('categories.create') }}">
                                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                    {{ __('partials.header.new_category') }}
                                </a>
                            @endcan

                            @can('viewAny', \App\User::class)
                                <a class="dropdown-item" href="{{ route('users.index') }}">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    {{ __('partials.header.all_users') }}
                                </a>
                            @endcan

                            @can('viewAny', \App\ContactRequest::class)
                                <a class="dropdown-item" href="{{ route('contact-requests.index') }}">
                                    <i class="fa fa-mail-reply" aria-hidden="true"></i>
                                    {{ __('contact.requests') }}
                                </a>
                            @endcan

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                {{ __('partials.header.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
