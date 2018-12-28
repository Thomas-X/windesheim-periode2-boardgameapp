@extends('layouts.app')


@section('content')
    <div class="jumbotron">
        <h2>Scores</h2>
        <p>
            Je kan alle scores hier beheren
        </p>
        <button class="btn btn-success" onclick="window.location.href = '{{ route('scoresCreate')  }}';">
            Gespeeld spel registreren
        </button>
    </div>
    <div>
        @if($scores->isEmpty())
            <h3>Er zijn nog geen scores..</h3>
        @endif
        <ul class="list-group">
            @foreach($scores as $score)
                <li class="list-group-item">
                    {{ $score->playedgames->games->name ?? 'Removed' }}&thinsp;|&thinsp;{{ $score->profiles->nickname ?? 'Removed' }}&thinsp;|&thinsp;{{ $score->score ?? 'Removed' }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection