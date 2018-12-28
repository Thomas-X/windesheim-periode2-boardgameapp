@extends('layouts.app')


@section('content')
    <div>
        <div class="jumbotron">
            <h2>Spel registreren</h2>
            Registreer een gespeeld spel
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('scoresCreate') }}" method="post" class="d-flex flex-column">
            @csrf
            <label>
                Spel
                <select class="form-control" name="game">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}">
                            {{ $game->name  }}
                        </option>
                    @endforeach
                </select>
            </label>
            <div class="playersContainer d-flex flex-column">
                <div class="playerSelect" style="display: none;">
                    <label>
                        Speler
                    </label>
                    {{-- Let's just hope these indexes never change... --}}
                    <select class="form-control" name="players[]">
                        @foreach($players as $player)
                            <option value="{{ $player->id }}">
                                {{ $player->nickname  }}
                            </option>
                        @endforeach
                    </select>
                    <label>
                        Score
                    </label>
                    <input class="form-control" name="scores[]" type="number"/>
                </div>
                <div>
                    <label>
                        Speler
                    </label>
                    {{-- Let's just hope these indexes never change... --}}
                    <select class="form-control" name="players[]">
                        @foreach($players as $player)
                            <option value="{{ $player->id }}">
                                {{ $player->nickname  }}
                            </option>
                        @endforeach
                    </select>
                    <label>
                        Score
                    </label>
                    <input class="form-control" name="scores[]" type="number"/>
                </div>
                <div>
                    <label>
                        Speler
                    </label>
                    {{-- Let's just hope these indexes never change... --}}
                    <select class="form-control" name="players[]">
                        @foreach($players as $player)
                            <option value="{{ $player->id }}">
                                {{ $player->nickname  }}
                            </option>
                        @endforeach
                    </select>
                    <label>
                        Score
                    </label>
                    <input class="form-control" name="scores[]" type="number"/>
                </div>
            </div>
            <div class="mt-2">
                <button class="btn btn-success" type="button" onclick="onAddPlayer()">
                    Extra speler toevoegen
                </button>
            </div>
            <div class="mt-3">
                <button class="btn" type="submit">
                    Aanmaken
                </button>
            </div>
        </form>
        <script>
			function onAddPlayer() {
				const elChild = document.getElementsByClassName('playerSelect')[0];
				const elParent = document.getElementsByClassName('playersContainer')[0];
				const clone = elChild.cloneNode(true);
				clone.style.display = "block";
				elParent.appendChild(clone);
			}
        </script>
    </div>
@endsection