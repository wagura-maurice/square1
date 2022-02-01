
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="{!! strtoupper(config('app.name')) !!}">
        <meta name="author" content="{!! config('app.author') !!}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{!! csrf_token() !!}">
        <title>{!! strtoupper(config('app.name')) !!}</title>
        <!-- CSS -->
        @include('layouts.partials.styles')
        <!-- APP -->
        <script type="text/javascript">
            var SITE_URL   = "{!! config('app.url') !!}";
            var CSRF_TOKEN = "{!! csrf_token() !!}";
        </script>
    </head>
    <body>
        <div id="app">
            <div id="sidebar" class="active">
                @include('layouts.partials.sidebar')
            </div>
            <div id="main" class='layout-navbar'>
                @include('layouts.partials.header')
                <div id="main-content">
                    <div class="page-heading">
                        <div class="page-title">
                            @yield('breadcrumb')
                        </div>
                        <section class="section">
                            @yield('content')
                        </section>
                    </div>
                    <!-- Footer -->
                    @include('layouts.partials.footer')
                </div>
            </div>
        </div>
        <!-- JavaScript -->
        @include('layouts.partials.scripts')
    </body>
</html>