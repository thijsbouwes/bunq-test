<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'row',
        'type',
        'index',
        'size',
        'name',
        'description',
        'price',
        'color',
        'class',
        'border'
    ];

}
