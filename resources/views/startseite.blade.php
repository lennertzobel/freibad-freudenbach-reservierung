@extends('layouts.default')

@section('content')
<div id="startseite">
    <header>
        <div class="container text-center text-white">
            <h1>
                <b>Freibad</b><br class="d-md-none"> Freudenbach
            </h1>
            <p>
                Spiel, Spaß und Sport<br class="d-md-none"> für Groß und Klein
            </p>
            <a class="btn btn-light" href="{{ url('/kontakt') }}">Kontakt</a>
        </div>
    </header>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col mx-auto" style="max-width: 65ch;">
                <h2 class="text-theme-2">
                    Freudenbach startet in die <span class="d-inline-block">Badesaison 2021</span>
                </h2>
                <p>
                    Das Freibad Freudenbach startet am kommenden Dienstag, 15. Juni 2021 in die neue Badesaison. Der Besuch des Freibades ist unter Einhaltung folgender Regelungen möglich:
                </p>
                <ul>
                    <li>
                        Der Besuch des Schwimmbades ist nur stundenweise und mit vorheriger Reservierung möglich:
                        <ul>
                            <li>
                                1. Zeitblock: 10:00 Uhr bis 13:30 Uhr
                            </li>
                            <li>
                                2. Zeitblock: 14:00 Uhr bis 19:30 Uhr
                            </li>
                        </ul>
                    </li>
                    <li>
                    Die Reservierung ist möglich:
                        <ul>
                            <li>
                                Online unter www.freudenbach.de
                            </li>
                            <li>
                                Telefonisch von 11:00 Uhr bis 12:00 Uhr und von 18:00 Uhr bis 19:00 Uhr unter der <a href="tel+4979337177">07933 7177</a>
                            </li>
                        </ul>
                    </li>
                    <li>Es werden nur Tageskarten und 10er Karten verkauft, in diesem Jahr gibt es keine Saisonkarten.</li>
                    <li>Die Anmeldung ist nur als Einzelperson oder Familie möglich.</li>
                    <li>Letzter Einlass ist jeweils eine halbe Stunde vor Ende des Zeitblocks.</li>
                    <li>Zum Ende des gebuchten Zeitblocks müssen alle Badegäste das Schwimmbad verlassen haben. In der anschließenden Schließzeit werden die erforderlichen Desinfektionsmaßnahmen durchgeführt.</li>
                    <li>Der Kiosk ist mit dem gewohnten Angebot geöffnet.</li>
                    <li>Im Eingangsbereich und am Kiosk besteht Maskenpflicht.</li>
                    <li>Eine Testpflicht besteht nicht, solange die Inzidenz im Main-Tauber-Kreis unter 35 liegt.</li>
                </ul>
                <p>
                    Wir weisen darauf hin, dass es innerhalb der Zeitblöcke zu Einschränkungen der Beckennutzung aufgrund von Vereins- und Schulsportbetrieb kommen kann und bitten um Ihr Verständnis. 
                </p>
                <p>
                    Es wird eine Badesaison mit Herausforderungen, mit veränderten Bedingungen, doch mit der Möglichkeit mit viel Freude und Herzenslust zu schwimmen, zu spielen, zu genießen und zu entspannen.
                </p>
                <p class="mb-0">
                    <b>Wir freuen uns auf Sie!</b>
                </p>
            </div>
            </div>
        </div>
    </section>
    <section class="section bg-theme-2 text-white">
        <div class="container text-center">
            <h2 class="mb-3">
                Das bietet unser Freibad
            </h2>
            <div class="row pt-3 justify-content-around">
                <div class="col-sm-6 col-lg-3 mb-3">
                    <img class="icon-feature mb-3" src="{{ asset('img/icon/heisser-pool.svg') }}" alt="">
                    <h6>25m Sportbecken</h6>
                    <p>mit vier Bahnen und Rutsche. Sanfter Einstieg über zwei Treppen möglich.</p>
                </div>
                <div class="col-sm-6 col-lg-3 mb-3">
                    <img class="icon-feature mb-3" src="{{ asset('img/icon/emoji.svg') }}" alt="">
                    <h6>Schönes Kinderbecken</h6>
                    <p>Beheiztes Kinderbecken mit roter Spaßrutsche. Einstieg über eine breite Treppe.</p>
                </div>
                <div class="col-sm-6 col-lg-3 mb-3">
                    <img class="icon-feature mb-3" src="{{ asset('img/icon/gras.svg') }}" alt="">
                    <h6>Große Liegewiese</h6>
                    <p>Großräumiges Areal mit Bäumen. Ausreichend schattige Liegeplätze.</p>
                </div>
                <div class="w-100 d-none d-lg-block"></div>
                <div class="col-sm-6 col-lg-3 mb-3">
                    <img class="icon-feature mb-3" src="{{ asset('img/icon/kiosk.svg') }}" alt="">
                    <h6>Kioskverkauf</h6>
                    <p>Wir bieten Ihnen ein Sortiment an Getränken, Snacks, Süßwaren und Eis an.</p>
                </div>
                <div class="col-sm-6 col-lg-3 mb-3">
                    <img class="icon-feature mb-3" src="{{ asset('img/icon/spielplatz.svg') }}" alt="">
                    <h6>Kinderspielplatz</h6>
                    <p>ausgestattet mit großem Rutschturm, Schaukel, Karussell und Federwippe.</p>
                </div>
                <div class="col-sm-6 col-lg-3 mb-3">
                    <img class="icon-feature mb-3" src="{{ asset('img/icon/volleyball.svg') }}" alt="">
                    <h6>Volleyballfeld</h6>
                    <p>am Ende der Liegewiese lädt das Volleyballfeld zum gemeinsamen Spielen ein.</p>
                </div>
            </div>            
        </div>
    </section>
    <section class="section overflow-hidden">
        <div class="container">
            <h2 class="text-center text-theme-2 mb-3">
                Impressionen
            </h2>
            <div class="pt-3">
                <div id="impressionen-slider">
                    <img class="img-fluid w-100 rounded" src="{{ asset('img/bild1.jpeg') }}">
                    <img class="img-fluid w-100 rounded" src="{{ asset('img/bild4.jpeg') }}">
                    <img class="img-fluid w-100 rounded" src="{{ asset('img/bild2.jpeg') }}">
                    <img class="img-fluid w-100 rounded" src="{{ asset('img/bild5.jpeg') }}">
                    <img class="img-fluid w-100 rounded" src="{{ asset('img/bild3.jpeg') }}">
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
