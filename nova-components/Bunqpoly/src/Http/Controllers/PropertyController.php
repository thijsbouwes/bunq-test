<?php

namespace Acme\Bunqpoly\Http\Controllers;

use Acme\Bunqpoly\Http\Requests\CreateGameRequest;
use App\Events\GameChanged;
use App\Game;
use App\Jobs\RequestPaymentForGame;
use App\Property;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertyController
{
    public function index()
    {
        $properties = Property::all();
        $rows = $properties->groupBy('row');

        return response()->json($rows);
    }
}
