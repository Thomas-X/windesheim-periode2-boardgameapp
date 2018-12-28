@extends('layouts.app')


@section('content')
    <div>
        <div class="jumbotron">
            <h1>Voeg een tijdelijke gebruiker toe..</h1>
        </div>
        <form method="post" action="/temp_user/create" class="d-flex flex-column">
            @csrf
            <label>
                Nickname
            </label>
            <input type="text" name="nickname" class="form-control"/>
            <div>
                <button type="submit" class="btn btn-success mt-3">
                    verzenden
                </button>
            </div>
        </form>
    </div>
@endsection