<?php

use Illuminate\Database\Seeder;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cards = [
            [
                'name' => 'Your bitcoins have done well you will receive € 200.',
                'action' => 'receive',
                'action_data' => '200'
            ],
            [
                'name' => 'You have forgotten to check out, you have to pay € 100.',
                'action' => 'pay',
                'action_data' => '100'
            ],
            [
                'name' => 'You have been hacked by anonymous, they have stolen € 300.',
                'action' => 'pay',
                'action_data' => '300'
            ],
            [
                'name' => 'The tax authorities have made a mistake you will receive € 200',
                'action' => 'receive',
                'action_data' => '200'
            ],
            [
                'name' => 'Go to Diemen metro station.',
                'action' => 'move',
                'action_data' => 'Diemen'
            ],
            [
                'name' => 'You were drunk yesterday pay Skihut, the bill of € 150.',
                'action' => 'pay',
                'action_data' => '150'
            ],
            [
                'name' => 'Your investments in the crypto have earned you € 300',
                'action' => 'receive',
                'action_data' => '300'
            ],
            [
                'name' => 'congratulations! You won € 150 with a scratch card.',
                'action' => 'receive',
                'action_data' => '150'
            ],
            [
                'name' => 'You dropped beer over your macbook. The repair costs are € 100.',
                'action' => 'pay',
                'action_data' => '100'
            ],
            [
                'name' => 'Congratulations! You won the hackathon, you get € 500',
                'action' => 'receive',
                'action_data' => '500'
            ],
            [
                'name' => 'You feel like to party. Go to the Red Light district',
                'action' => 'move',
                'action_data' => 'Red Light District'
            ],
            [
                'name' => 'You\'re caught using drugs. Go straight to jail!',
                'action' => 'move',
                'action_data' => 'Jail'
            ],
            [
                'name' => 'You won the lottery, you get € 250',
                'action' => 'receive',
                'action_data' => '250'
            ],
            [
                'name' => 'You have taken away empty crates of beer, you get € 100',
                'action' => 'receive',
                'action_data' => '100'
            ],
            [
                'name' => 'You have knocked over an expensive vase. You have to pay € 50',
                'action' => 'receive',
                'action_data' => '50'
            ]
        ];

        \App\Card::insert($cards);
    }
}
