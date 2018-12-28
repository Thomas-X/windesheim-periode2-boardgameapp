@extends('layouts.app')


@section('content')
    <div>
        <div class="jumbotron">
            <h2>Games</h2>
            <p>
                Je kan alle games hier beheren
            </p>
            {{-- ¯\_(ツ)_/¯ --}}
            <button class="btn btn-success" onclick="window.location.href = '{{ route('gamesCreate') }}';">
                Nieuwe game aanmaken
            </button>
        </div>
        <ul class="list-group">
            @if($games->isEmpty())
                <h3>Er zijn nog geen games..</h3>
            @endif
            @foreach($games as $game)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div>
                            {{ $game->name }}
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-dark m-1"
                                    onclick="window.location.href = '/games/{{ $game->id }}/edit';">
                                aanpassen
                            </button>
                            <form method="POST" action="/games/{{ $game->id  }}/destroy">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-1" type="submit">
                                    verwijderen
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection