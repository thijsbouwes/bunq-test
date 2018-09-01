<?php

$bl = 'b-left';
$br = 'b-right';
$bt = 'b-top';
$bb = 'b-bottom';

function generateCard(string $type, $name, $city, string $color = '', float $price = 0, $border = [], string $size = 'small')
{
    return [
        'type' => $type,
        'size' => $size,
        'name' => $name,
        'city' => $city,
        'price' => $price,
        'color' => $color,
        'border' => $border
    ];
}

return [
    'cards' =>
    [
        'rows' =>
        [
            0 => [
                generateCard('start', 'Start', '', '', 0, [],'big'),

                generateCard('street', 'Dorpstraat1', 'Ons dorp', 'blue-dark', 60, [$bl, $br]),
                generateCard('street', 'Dorpstraat2', 'Ons dorp', 'blue-dark', 60, [$br]),
                generateCard('street', 'Dorpstraat3', 'Ons dorp', 'none', 60),
                generateCard('street', 'Dorpstraat4', 'Ons dorp', 'red-dark', 60, [$bl, $br]),
                generateCard('street', 'Dorpstraat4', 'Ons dorp', 'none', 60),
                generateCard('street', 'Dorpstraat5', 'Ons dorp', 'red-dark', 60, [$bl, $br]),
                generateCard('street', 'Dorpstraat6', 'Ons dorp', 'red-dark', 60, [$br]),
                generateCard('street', 'Dorpstraat7', 'Ons dorp', 'none', 60),
                generateCard('street', 'Dorpstraat8', 'Ons dorp', 'orange', 60, [$bl, $br]),

                generateCard('prison', 'Prison', '', '', 0, [], 'big'),
            ],
            1 => [
                generateCard('street', 'Dorpstraat9', 'Ons dorp', 'blue', 60, [$bt, $bb]),
                generateCard('street', 'Dorpstraat10', 'Ons dorp', 'blue', 60, [$bb]),
                generateCard('street', 'Dorpstraat11', 'Ons dorp', 'none', 60),
                generateCard('street', 'Dorpstraat12', 'Ons dorp', 'ocean', 60, [$bt, $bb]),
                generateCard('street', 'Dorpstraat13', 'Ons dorp', 'ocean', 60, [$bt]),
            ],
            2 => [
                generateCard('street', 'Dorpstraat14', 'Ons dorp', 'orange', 60, [$bt, $bb]),
                generateCard('street', 'Dorpstraat15', 'Ons dorp', 'orange', 60, [$bt]),
                generateCard('street', 'Dorpstraat16', 'Ons dorp', 'none', 60),
                generateCard('street', 'Dorpstraat17', 'Ons dorp', 'yellow', 60, [$bt, $bb]),
                generateCard('street', 'Dorpstraat18', 'Ons dorp', 'yellow', 60, [$bt]),
            ],
            3 => [
                generateCard('go_prison', 'Prison', '', '', 0, [], 'big'),

                generateCard('street', 'Dorpstraat19', 'Ons dorp', 'ocean', 60, [$bl, $br]),
                generateCard('street', 'Dorpstraat20', 'Ons dorp', 'none', 60),
                generateCard('street', 'Dorpstraat21', 'Ons dorp', 'lime', 60, [$bl, $br]),
                generateCard('street', 'Dorpstraat22', 'Ons dorp', 'lime', 60, [$br]),
                generateCard('street', 'Dorpstraat23', 'Ons dorp', 'none', 60),
                generateCard('street', 'Dorpstraat24', 'Ons dorp', 'lime', 60, [$bl, $br]),
                generateCard('street', 'Dorpstraat25', 'Ons dorp', 'none', 60),
                generateCard('street', 'Dorpstraat26', 'Ons dorp', 'green-dark', 60, [$bl, $br]),
                generateCard('street', 'Dorpstraat27', 'Ons dorp', 'green-dark', 60, [$br]),

                generateCard('lottery', 'Lottery', '', '', 0, [], 'big'),
            ],
        ]
    ]
];