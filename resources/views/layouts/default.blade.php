<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        <title>@yield('title') - Freibad Freudenbach</title>
    @else
        <title>Freibad Freudenbach</title>
    @endif

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav id="main-navbar" class="navbar navbar-expand-md navbar-light shadow-sm bg-white-90 py-3">
            <div class="container">
                <a class="navbar-brand mr-auto" href="{{ url('/') }}">
                    <span>Freibad</span> Freudenbach
                </a>
                <a href="{{ url('/reservierung/morgen') }}" class="btn btn-theme-4 d-none d-sm-inline-block order-md-1 ml-md-2">
                    Online Reservierung
                </a>
                <button class="navbar-toggler ml-sm-2 ml-md-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Request::is('kontakt') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/kontakt') }}">Kontakt</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="fixed-bottom py-3 bg-white-90 d-sm-none">
            <div class="container">
                <a href="{{ url('/reservierung/morgen') }}" class="btn btn-block btn-theme-4">Online Reservierung</a>
            </div>
        </div>

        <main class="full-height">
            @yield('content')
        </main>

        <footer id="main-footer" class="bg-theme-2 text-white">
            <div class="container d-md-flex align-items-md-center justify-content-md-between">
                <div class="footer-brand mb-2 mb-md-0">
                    <span>Freibad</span> Freudenbach
                </div>
                <div class="d-flex flex-column flex-md-row">
                    <a class="text-reset ml-md-3 mt-2 mt-md-0" href="{{ url('/impressum') }}">Impressum</a>
                    <a class="text-reset ml-md-3 mt-2 mt-md-0" href="{{ url('/datenschutz') }}">Datenschutz</a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
