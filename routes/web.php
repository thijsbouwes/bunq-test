<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@show');

Route::get('/bunqpoly/login', function () {
    return redirect('/');
});

Route::get('/test', 'Api\\Bunq@makeRequest');

Route::get('/ola', function() {
    $id = 13182842;
    $user = \App\User::whereHas('games', function($query) use ($id) {
        $query->where('payment_reference', $id);
    })->firstOrFail();

    $game = \App\Game::whereHas('users', function($query) use ($user, $id) {
        $query->where('payment_reference', $id);
    })->firstOrFail();

    $user->games()->updateExistingPivot($game->id, [
        'payment_status' => 'rejected'
    ]);

    dd($game);
});