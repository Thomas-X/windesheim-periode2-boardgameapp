<?php

namespace App\Http\Controllers;

use App\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{

    public function __construct ()
    {

//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {

        $games = Games::all();

        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {

        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {

        request()->validate(Games::$validations);
        Games::create(request()->all());

        return redirect(route('gamesIndex'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Games $games
     *
     * @return \Illuminate\Http\Response
     */
    public function show (Games $games)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Games $games
     *
     * @return \Illuminate\Http\Response
     */
    public function edit (Games $games)
    {

        $game = $games->toArray();

        return view('games.update', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Games               $games
     *
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, Games $games)
    {

        request()->validate(Games::$validations);
        $games->update(request()->all());

        return redirect(route('gamesIndex'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Games $games
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy (Games $games)
    {
        $games->delete();
        return redirect(route('gamesIndex'));

    }
}
