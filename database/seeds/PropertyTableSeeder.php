<?php

use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cards = config('bunqpoly.cards');

        \App\Property::insert($cards);
    }
}
