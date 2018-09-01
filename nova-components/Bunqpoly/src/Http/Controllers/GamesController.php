<?php

namespace Acme\Bunqpoly\Http\Controllers;

use Acme\Bunqpoly\Http\Requests\CreateGameRequest;
use App\Events\GameChanged;
use App\Game;
use App\Jobs\RequestPaymentForGame;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GamesController
{
    public function index()
    {
        $games = Game::where('status', 'pending')->get();

        return response()->json($games);
    }

    public function show(Game $game)
    {
        return response()->json($game);
    }

    public function store(CreateGameRequest $request)
    {
        $user = $request->user();
        $game = Game::create(
            $request->validated()
        );

        $this->joinUserInGame($game, $user);

        return response()->json($game);
    }

    public function join(Game $game, Request $request)
    {
        $user = $request->user();

        // User is all-ready in game
        if ($game->users->contains('id', $user->id) === true) {
            return response()->json();
        }

        // Game is all-ready started
        if ($game->status !== 'pending') {
            return response()->json([], Response::HTTP_BAD_REQUEST);
        }

        $this->joinUserInGame($game, $user);

        return response()->json();
    }

    private function joinUserInGame(Game $game, User $user)
    {
        // Attach and request
        $game->users()->attach($user->id);
        RequestPaymentForGame::dispatch($user, $game);

        // Sent event
        event(new GameChanged($game));
    }
}
