<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reservierung Heute - Freibad Freudenbach</title>

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
            </div>
        </nav>

        <main class="full-height">
            <div id="reservierung-erfolg">
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-5 mx-auto">
                                <div class="p-4 text-center border border-success rounded mb-4">
                                    <h1 class="text-success">Vielen Dank!</h1>
                                    <p>Ihre Reservierung ist bei uns angekommen.</p>
                                    <a href="{{ url('/') }}" class="btn btn-success">Zur Startseite</a>
                                </div>
                                <h2>Ihre Reservierung</h2>
                                <h5>Datum</h5>
                                <div class="mb-3">{{ old('datum') }}</div>
                                <h5>Zeitraum</h5>
                                <div class="mb-3">
                                    @switch(old('zeitraum'))
                                        @case('morning')
                                            10:00 - 13:30
                                            @break
                                        @case('noon')
                                            14:00 - 17:30
                                            @break
                                        @case('evening')
                                            18:00 - 19:30
                                            @break
                                        @case('noon_evening')
                                            14:00 - 19:30
                                            @break
                                    @endswitch
                                </div>
                                <h5>Name</h5>
                                <div class="mb-3">{{ old('vorname') . ' ' . old('nachname') }}</div>
                                <h5>Telefon</h5>
                                <div class="mb-3">{{ old('telefon') }}</div>
                                <h5>Anzahl der Teilnehmer</h5>
                                <div>{{ old('anzahl') }}</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>
