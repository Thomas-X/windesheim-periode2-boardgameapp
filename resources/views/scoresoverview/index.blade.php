@extends('layouts.app')


@section('content')
    <div>
        <div class="jumbotron">
            <h2>Scores overzicht</h2>
            <p>
                Hier kan je rapportages vinden van gespeelde spellen en de hoogste scores (stand tegenover
                andere spelers)
            </p>
        </div>
        <div>
            <div class="row">
                <div class="col col-md-6 col-sm-12">
                    <h1>Statistieken</h1>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col col-sm-6">Totaal gespeelde spellen:</div>
                                <div class="col col-sm-6">{{ $stats['totalPlayed']  }}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col col-sm-6">Totaal spelers:</div>
                                <div class="col col-sm-6">{{ $stats['totalPlayers']  }}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col col-sm-6">Totaal spellen:</div>
                                <div class="col col-sm-6">{{ $stats['totalGames']  }}</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col col-md-6 col-sm-12">
                    <h1>Hoogste scores:</h1>
                    <ul class="list-group">
                        @foreach($stats['scores'] as $score)
                            <li class="list-group-item">
                                {{ $score->playedgames->games->name ?? 'Removed' }}&thinsp;|&thinsp;{{ $score->profiles->nickname ?? 'Removed' }}&thinsp;|&thinsp;{{ $score->score ?? 'Removed' }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection