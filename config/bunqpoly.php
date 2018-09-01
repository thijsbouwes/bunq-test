<?php

$bl = 'b-left';
$br = 'b-right';
$bt = 'b-top';
$bb = 'b-bottom';

function generateCard(string $type, int $index, $name, $city, string $color = '', float $price = 0, $border = [], string $class = '', string $size = 'small')
{
    return [
        'type' => $type,
        'index' => $index,
        'size' => $size,
        'name' => $name,
        'city' => $city,
        'price' => $price,
        'color' => $color,
        'class' => $class,
        'border' => $border
    ];
}

return [
    'cards' =>
    [
        'rows' =>
        [
            0 => [
                generateCard('parking', 16, 'Lottery', '', '', 0, [], 'card--big-tl', 'big'),

                generateCard('street', 17, 'Dorpstraat1', 'Ons dorp', 'blue-dark', 60, [$bl, $br]),
                generateCard('street', 18, 'Dorpstraat2', 'Ons dorp', 'blue-dark', 60, [$br]),
                generateCard('street', 19, 'Dorpstraat3', 'Ons dorp', 'none', 60),
                generateCard('street', 20, 'Dorpstraat4', 'Ons dorp', 'red-dark', 60, [$bl, $br]),
                generateCard('street', 21, 'Dorpstraat4', 'Ons dorp', 'none', 60),
                generateCard('street', 22, 'Dorpstraat5', 'Ons dorp', 'red-dark', 60, [$bl, $br]),
                generateCard('street', 23, 'Dorpstraat6', 'Ons dorp', 'red-dark', 60, [$br]),
                generateCard('street', 24, 'Dorpstraat7', 'Ons dorp', 'none', 60),
                generateCard('street', 25, 'Dorpstraat8', 'Ons dorp', 'orange', 60, [$bl, $br]),

                generateCard('go_prison', 26, 'Prison', '', '', 0, [], 'card--big-tr', 'big'),
            ],
            1 => [
                generateCard('street', 15, 'Dorpstraat9', 'Ons dorp', 'blue', 60, [$bt, $bb]),
                generateCard('street', 14, 'Dorpstraat10', 'Ons dorp', 'blue', 60, [$bb]),
                generateCard('street', 13, 'Dorpstraat11', 'Ons dorp', 'none', 60),
                generateCard('street', 12, 'Dorpstraat12', 'Ons dorp', 'ocean', 60, [$bt, $bb]),
                generateCard('street', 11, 'Dorpstraat13', 'Ons dorp', 'ocean', 60, [$bb]),
            ],
            2 => [
                generateCard('street', 27, 'Dorpstraat14', 'Ons dorp', 'orange', 60, [$bt, $bb]),
                generateCard('street', 28, 'Dorpstraat15', 'Ons dorp', 'orange', 60, [$bb]),
                generateCard('street', 29, 'Dorpstraat16', 'Ons dorp', 'none', 60),
                generateCard('street', 30, 'Dorpstraat17', 'Ons dorp', 'yellow', 60, [$bt, $bb]),
                generateCard('street', 31, 'Dorpstraat18', 'Ons dorp', 'yellow', 60, [$bb]),
            ],
            3 => [
                generateCard('prison', 10, 'Prison', '', '', 0, [], 'card--big-bl', 'big'),

                generateCard('street', 9, 'Dorpstraat19', 'Ons dorp', 'ocean', 60, [$bl, $br]),
                generateCard('street', 8, 'Dorpstraat20', 'Ons dorp', 'none', 60),
                generateCard('street', 7, 'Dorpstraat21', 'Ons dorp', 'lime', 60, [$bl, $br]),
                generateCard('street', 6, 'Dorpstraat22', 'Ons dorp', 'lime', 60, [$br]),
                generateCard('street', 5, 'Dorpstraat23', 'Ons dorp', 'none', 60),
                generateCard('street', 4, 'Dorpstraat24', 'Ons dorp', 'lime', 60, [$bl, $br]),
                generateCard('street', 3, 'Dorpstraat25', 'Ons dorp', 'none', 60),
                generateCard('street', 2, 'Dorpstraat26', 'Ons dorp', 'green-dark', 60, [$bl, $br]),
                generateCard('street', 1, 'Dorpstraat27', 'Ons dorp', 'green-dark', 60, [$br]),

                generateCard('start', 0, 'Start', '', '', 0, [], 'card--big-br','big'),
            ],
        ]
    ]
];