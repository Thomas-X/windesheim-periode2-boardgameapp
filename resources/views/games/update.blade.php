@extends('layouts.app')


@section('content')
    <div>
        <div class="jumbotron">
            <h2>Game aanpassen</h2>
            <p>
                Pas een game aan
            </p>
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
        <form action="/games/{{ $game['id'] }}/update" method="post" class="d-flex flex-column">
            @method('PATCH')
            @csrf
            <label>
                Naam
                <input class="form-control" name="name" type="text" value="{{ $game['name'] ?? '' }}"/>
            </label>
            <label>
                Beschrijving
                <textarea class="form-control" name="description">{{ $game['description'] ?? '' }}</textarea>
            </label>
            <div>
                <button class="btn" type="submit">
                    Aanpassen
                </button>
            </div>
        </form>
    </div>
@endsection