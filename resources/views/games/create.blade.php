@extends('layouts.app')


@section('content')
    <div>
        <div class="jumbotron">
            <h2>Game aanmaken</h2>
            Maak een game aan.
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
        <form action="/games/create" method="post" class="d-flex flex-column">
            @csrf
            <label>
                Naam
                <input class="form-control" name="name" type="text"/>
            </label>
            <label>
                Beschrijving
                <textarea class="form-control" name="description">

                </textarea>
            </label>
            <div>
                <button class="btn" type="submit">
                    Aanmaken
                </button>
            </div>
        </form>
    </div>
@endsection