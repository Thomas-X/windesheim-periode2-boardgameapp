<?php

namespace App\Http\Controllers;

use App\Games;
use App\PlayedGames;
use App\Profiles;
use App\Scores;
use Illuminate\Http\Request;

class ScoresController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {

        $scores = Scores::all()
            ->load('profiles', 'playedgames.games');

        return view('scores.index', compact('scores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {

        $games = Games::all();
        $players = Profiles::all();

        return view('scores.create', compact('games', 'players'));
    }

    /**
     * Store a newly created resource in storage.
     * Also updates profiles
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        // TODO add new validation rule instead of just required
//        function ($attribute, $value, $fail) {
//            $a = collect($value);
//            $b = collect(
//                collect($value)
//                    ->filter(function ($value, $key) {
//
//                        return $value !== null;
//                    }
//                    )->toArray()
//            )->unique();
//            if ($a->count() !== $b->count()) {
//                $fail($attribute . ' is duplicate');
//            }
//        }
        request()->validate([
                                'game'    => 'required|string',
                                'players' => 'required',
                                'scores'  => 'required',
                            ]
        );
        // Collect values into Eloquent collections
        $players = collect(request()->all()['players']);
        $scores = collect(request()->all()['scores']);

        // Remove hidden input fields..
        $players->pull(0);
        $scores->pull(0);

        $playersScores = $players->map(function ($item, $index) use ($scores) {

            return [
                'playerId' => $item,
                'score'    => $scores->toArray()[$index],
            ];
        }
        );

        $playedGame = PlayedGames::create([
                                              'games_id' => request()->all()['game'],
                                          ]
        );
        foreach ( $playersScores->toArray() as $playerScore ) {
            Profiles::find($playerScore['playerId'])
                ->scores()
                ->create([
                             'score'          => $playerScore['score'],
                             'playedgames_id' => $playedGame->id,
                             'profiles_id'    => $playerScore['playerId'],
                         ]
                );
            $profiles = Profiles::find($playerScore['playerId']);
            $profiles->totalGames = $profiles->totalGames + 1;
            $profiles->save();

        }

        return redirect(route('scoresIndex'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scores $scores
     *
     * @return \Illuminate\Http\Response
     */
    public function show (Scores $scores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scores $scores
     *
     * @return \Illuminate\Http\Response
     */
    public function edit (Scores $scores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Scores              $scores
     *
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, Scores $scores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scores $scores
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy (Scores $scores)
    {
        //
    }
}
