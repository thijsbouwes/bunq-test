<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $with = [
        'users',
        'moves'
    ];

    protected $fillable = [
        'name',
        'price',
        'status'
    ];

    //
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['payment_reference', 'payment_status'])
            ->orderBy('name');
    }

    public function moves()
    {
        return $this->hasMany(Move::class)
            ->orderBy('created_at');
    }

    public function getNextUser()
    {
        $users = $this->users;
        $previousMove = $this->moves()->first();

        // No moves, return first user
        if ($previousMove === null) {
            return $users->first();
        }

        $previousUser = $previousMove->user;
        $userKey = null;
        $users->map(function($user, $key) use ($previousUser, $userKey) {
            if ($previousUser->id === $user->id) {
                $userKey = $key;
            }
        });

        $userKey = $userKey++;
        $users = $users->toArray();
        if (key_exists($userKey, $users)) {
            return $users[$userKey];
        }

        // First user is again
        return $users->first();
    }
}
