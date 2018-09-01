<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $with = [
        'users'
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
            ->withPivot(['payment_reference', 'payment_status']);
    }
}
