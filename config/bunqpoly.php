<?php

$bl = 'b-left';
$br = 'b-right';
$bt = 'b-top';
$bb = 'b-bottom';

function generateCard(int $row, string $type, int $index, $name, $city, string $color = '', float $price = 0, $border = [], string $class = '', string $size = 'small')
{
    return [
        'row' => $row,
        'type' => $type,
        'index' => $index,
        'size' => $size,
        'name' => $name,
        'description' => $city,
        'price' => $price,
        'color' => $color,
        'classes' => $class,
        'border' => implode(' ', $border)
    ];
}

return [
    'cards' => [
        // row 0
        generateCard(0, 'parking', 16, 'Lottery', '', '', 0, [], 'card--big-tl', 'big'),

        generateCard(0, 'street', 17, 'Dorpstraat1', 'Ons dorp', 'blue-dark', 60, [$bl, $br]),
        generateCard(0, 'street', 18, 'Dorpstraat2', 'Ons dorp', 'blue-dark', 60, [$br]),
        generateCard(0, 'street', 19, 'Dorpstraat3', 'Ons dorp', 'none', 60),
        generateCard(0, 'street', 20, 'Dorpstraat4', 'Ons dorp', 'red-dark', 60, [$bl, $br]),
        generateCard(0, 'street', 21, 'Dorpstraat4', 'Ons dorp', 'none', 60),
        generateCard(0, 'street', 22, 'Dorpstraat5', 'Ons dorp', 'red-dark', 60, [$bl, $br]),
        generateCard(0, 'street', 23, 'Dorpstraat6', 'Ons dorp', 'red-dark', 60, [$br]),
        generateCard(0, 'street', 24, 'Dorpstraat7', 'Ons dorp', 'none', 60),
        generateCard(0, 'street', 25, 'Dorpstraat8', 'Ons dorp', 'orange', 60, [$bl, $br]),

        generateCard(0, 'go_prison', 26, 'Prison', '', '', 0, [], 'card--big-tr', 'big'),

        // row 1
        generateCard(1, 'street', 15, 'Dorpstraat9', 'Ons dorp', 'blue', 60, [$bt, $bb]),
        generateCard(1, 'street', 14, 'Dorpstraat10', 'Ons dorp', 'blue', 60, [$bb]),
        generateCard(1, 'street', 13, 'Dorpstraat11', 'Ons dorp', 'none', 60),
        generateCard(1, 'street', 12, 'Dorpstraat12', 'Ons dorp', 'ocean', 60, [$bt, $bb]),
        generateCard(1, 'street', 11, 'Dorpstraat13', 'Ons dorp', 'ocean', 60, [$bb]),

        // row 2
        generateCard(2, 'street', 27, 'Dorpstraat14', 'Ons dorp', 'orange', 60, [$bt, $bb]),
        generateCard(2, 'street', 28, 'Dorpstraat15', 'Ons dorp', 'orange', 60, [$bb]),
        generateCard(2, 'street', 29, 'Dorpstraat16', 'Ons dorp', 'none', 60),
        generateCard(2, 'street', 30, 'Dorpstraat17', 'Ons dorp', 'yellow', 60, [$bt, $bb]),
        generateCard(2, 'street', 31, 'Dorpstraat18', 'Ons dorp', 'yellow', 60, [$bb]),

        // row 3
        generateCard(3, 'prison', 10, 'Prison', '', '', 0, [], 'card--big-bl', 'big'),

        generateCard(3, 'street', 9, 'Dorpstraat19', 'Ons dorp', 'ocean', 60, [$bl, $br]),
        generateCard(3, 'street', 8, 'Dorpstraat20', 'Ons dorp', 'none', 60),
        generateCard(3, 'street', 7, 'Dorpstraat21', 'Ons dorp', 'lime', 60, [$bl, $br]),
        generateCard(3, 'street', 6, 'Dorpstraat22', 'Ons dorp', 'lime', 60, [$br]),
        generateCard(3, 'street', 5, 'Dorpstraat23', 'Ons dorp', 'none', 60),
        generateCard(3, 'street', 4, 'Dorpstraat24', 'Ons dorp', 'lime', 60, [$bl, $br]),
        generateCard(3, 'street', 3, 'Dorpstraat25', 'Ons dorp', 'none', 60),
        generateCard(3, 'street', 2, 'Dorpstraat26', 'Ons dorp', 'green-dark', 60, [$bl, $br]),
        generateCard(3, 'street', 1, 'Dorpstraat27', 'Ons dorp', 'green-dark', 60, [$br]),

        generateCard(3, 'start', 0, 'Start', '', '', 0, [], 'card--big-br','big'),
    ]
];