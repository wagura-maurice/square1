<!DOCTYPE html>
<html lang="{!! str_replace('_', '-', app()->getLocale()) !!}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{!! csrf_token() !!}">
        <title>{!! config('app.name', 'Laravel') !!}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{!! asset('vendors/toastify.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! mix('css/app.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! mix('css/bootstrap.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! mix('css/pages/guest.css') !!}">
        <!-- favicons -->
        <link rel="shortcut icon" href="{!! getSetting('SYSTEM_LOGO_IMAGE') !!}" type="image/x-icon">
        <!-- CSS -->
        @stack('styles')
        <!-- APP -->
        <script type="text/javascript">
            var SITE_URL   = "{!! config('app.url') !!}";
            var CSRF_TOKEN = "{!! csrf_token() !!}";
        </script>

    </head>
    <body>
        <div id="app">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                    <div class="container">
                        <a class="navbar-brand me-auto" href="{!! route('website.index') !!}">
                            <img src="{!! getSetting('SYSTEM_LOGO_IMAGE') !!}" alt="{!! config('app.name') !!}">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link {!! checkRoute('website.welcome') ? 'active' : NULL !!}" aria-current="page" href="{!! route('website.welcome') !!}">{!! __('Welcome') !!}</a>
                                </li>
                                @if (Route::has('login'))
                                    <!-- <div class="top-right links"> -->
                                        @auth
                                        <li class="nav-item">
                                            <a class="nav-link {!! checkRoute('home') ? 'active' : NULL !!}" aria-current="page" href="{!! route('home') !!}">{!! __('Home') !!}</a>
                                        </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link {!! checkRoute('login') ? 'active' : NULL !!}" aria-current="page" href="{!! route('login') !!}">{!! __('Login') !!}</a>
                                            </li>
                                            @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link {!! checkRoute('register') ? 'active' : NULL !!}" aria-current="page" href="{!! route('register') !!}">{!! __('Register') !!}</a>
                                            </li>
                                            @endif
                                        @endauth
                                    <!-- </div> -->
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="container">
                @yield('content')
            </div>
        </div>
        <!-- Scripts -->
        <script type="text/javascript" src="{!! asset('vendors/toastify.js') !!}"></script>
        <script type="text/javascript" src="{!! mix('js/bootstrap.bundle.min.js') !!}"></script>
        <script type="text/javascript" src="{!! mix('js/app.js') !!}"></script>
        <!-- JavaScript -->
        @stack('scripts')
    </body>
</html>
