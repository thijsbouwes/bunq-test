<?php

namespace Acme\Bunqpoly\Http\Controllers;

use Acme\Bunqpoly\Http\Requests\CreateGameRequest;
use App\Events\GameChanged;
use App\Events\GameUserTurn;
use App\Game;
use App\Jobs\RequestPaymentForGame;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PlayGameController
{
    public function throwDices(Game $game)
    {
        $user = Auth::user();
        $nextUser = $game->getNextUser();

        if ($user->id !== $nextUser->id) {
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }

        $data     = [random_int(1, 6), random_int(1, 6)];
        $lastMove = $user->moves()->where('game_id', $game->id)->orderBy('created_at')->first();
        $from     = $lastMove !== null ? $lastMove->from : 0;
        $total    = $from + $data[0] + $data[1];

        $game->moves()->create([
            'user_id' => $user->id,
            'from' => $from,
            'to' => $total >= 32 ? $total - 32 : $total
        ]);

        event(new GameUserTurn($game, $user, 'move'));

        return response()->json($data);
    }

    public function turn(Game $game)
    {
        $user = $game->getNextUser();

        return response()->json($user);
    }
}
