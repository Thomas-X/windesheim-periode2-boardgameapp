@extends('layouts.app')


@section('content')
    <div class="jumbotron">
        <h1>Scores registreren</h1>
    </div>
    <div>
        @if($scores->isEmpty())
            <h3>Er zijn nog geen scores..</h3>
        @endif
    </div>
@endsection