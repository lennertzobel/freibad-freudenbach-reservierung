<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Online Reservierung - Freibad Freudenbach</title>

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
            <div id="reservierung-heute">
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-5 mx-auto">
                                <h1 class="text-theme-2 mb-4">Online Reservierung</h1>
                                @error('allgemein')
                                <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                                @error('datum')
                                <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                                <form method="post" action="/{{ request()->path() }}" novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <span class="d-inline-block mb-2">Datum</span>
                                        <div class="form-row align-items-center">
                                            <div class="col">
                                                <input class="form-control" type="text" value="{{ $date }}" id="input-datum" name="datum" readonly>
                                            </div>
                                            <div class="col-auto">
                                                <a class="btn btn-theme-2" href="{{ url($date_button_url) }}">{!! $date_button_caption !!}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between align-items-end mb-2">
                                            <span class="d-inline-block">Zeitraum</span>
                                            <span class="d-inline-block small">(Freie Plätze)</span>
                                        </div>
                                        <div class="btn-group-vertical w-100 btn-group-toggle @error('zeitraum') is-invalid @enderror" data-toggle="buttons">
                                            @isset( $available_morning )
                                                <label class="btn btn-secondary d-flex justify-content-between align-items-center">
                                                    <input type="radio" name="zeitraum" id="input-morgen" value="morning" @if(old('zeitraum') == 'morning') checked @endif> 
                                                    <span>
                                                        10:00 - 13:30
                                                    </span> 
                                                    <span class="px-2 py-1 small font-weight-bold rounded-pill bg-theme-2">{{ $available_morning }}</span>
                                                </label>
                                            @endisset
                                            @isset( $available_noon )
                                                <label class="btn btn-secondary d-flex justify-content-between align-items-center">
                                                    <input type="radio" name="zeitraum" id="input-mittag" value="noon" @if(old('zeitraum') == 'noon') checked @endif> 
                                                    <span>
                                                        14:00 - 17:30
                                                    </span> 
                                                    <span class="px-2 py-1 small font-weight-bold rounded-pill bg-theme-2">{{ $available_noon }}</span>
                                                </label>
                                            @endisset
                                            @isset( $available_evening )
                                                <label class="btn btn-secondary d-flex justify-content-between align-items-center">
                                                    <input type="radio" name="zeitraum" id="input-abend" value="evening" @if(old('zeitraum') == 'evening') checked @endif> 
                                                    <span>
                                                        18:00 - 19:30
                                                    </span> 
                                                    <span class="px-2 py-1 small font-weight-bold rounded-pill bg-theme-2">{{ $available_evening }}</span>
                                                </label>
                                            @endisset
                                            @isset( $available_noon_evening )
                                                <label class="btn btn-secondary d-flex justify-content-between align-items-center">
                                                    <input type="radio" name="zeitraum" id="input-mittag-abend" value="noon_evening" @if(old('zeitraum') == 'noon_evening') checked @endif> 
                                                    <span>
                                                        14:00 - 19:30
                                                    </span> 
                                                    <span class="px-2 py-1 small font-weight-bold rounded-pill bg-theme-2">{{ $available_noon_evening }}</span>
                                                </label>
                                            @endisset
                                        </div>
                                        @error('zeitraum') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="input-vorname">Vorname</label>
                                        <input type="text" class="form-control @error('vorname') is-invalid @enderror" id="input-vorname" name="vorname" value="{{ old('vorname') }}">
                                        @error('vorname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="input-nachname">Nachname</label>
                                        <input type="text" class="form-control @error('nachname') is-invalid @enderror" id="input-nachname" name="nachname" value="{{ old('nachname') }}">
                                        @error('nachname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="input-telefon">Telefon</label>
                                        <input type="text" class="form-control @error('telefon') is-invalid @enderror" id="input-telefon" name="telefon" value="{{ old('telefon') }}">
                                        @error('telefon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="input-anzahl">Anzahl der Teilnehmer (max. 6)</label>
                                        <input type="number" min="1" max="6" class="form-control @error('anzahl') is-invalid @enderror" id="input-anzahl" name="anzahl" value="{{ old('anzahl', '1') }}">
                                        @error('anzahl') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        <small class="form-text text-muted">Nur Familienmitglieder erlaubt!</small>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-block btn-theme-4">Reservierung senden</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>
