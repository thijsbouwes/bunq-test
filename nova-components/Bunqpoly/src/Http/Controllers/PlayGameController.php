<?php

namespace Acme\Bunqpoly\Http\Controllers;

use Acme\Bunqpoly\Http\Requests\CreateGameRequest;
use App\Events\GameChanged;
use App\Game;
use App\Jobs\RequestPaymentForGame;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlayGameController
{
    public function throwDices(Game $game)
    {
        $data = [random_int(1, 6), random_int(1, 6)];

        event(new GameChanged($game, 'move'));

        return response()->json($data);
    }
}
