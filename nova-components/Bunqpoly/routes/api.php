<?php

use Illuminate\Support\Facades\Route;
use Acme\Bunqpoly\Http\Controllers\GamesController;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/games', GamesController::class.'@index');
Route::post('/games', GamesController::class.'@store');
Route::get('/games/{game}', GamesController::class.'@show');
Route::post('/games/{game}/join', GamesController::class.'@join');

//Route::
