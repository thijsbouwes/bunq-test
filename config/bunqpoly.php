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
        generateCard(0, 'parking', 16, 'Free Parking', '', '', 0, [], 'property--big-tl', 'big'),

        generateCard(0, 'street', 17, 'Foam', 'Ons dorp', 'blue-dark', 170, [$bl, $br]),
        generateCard(0, 'street', 18, 'Madame Tussauds', 'Ons dorp', 'blue-dark', 190, [$br]),
        generateCard(0, 'chance', 19, 'Chance', 'Ons dorp', 'none'),
        generateCard(0, 'street', 20, 'Red Light District', 'Ons dorp', 'red-dark', 200, [$bl, $br]),
        generateCard(0, 'street', 21, 'Schagen', 'Ons dorp', 'none', 200),
        generateCard(0, 'street', 22, 'The Big Road', 'Ons dorp', 'red-dark', 210, [$bl, $br]),
        generateCard(0, 'street', 23, 'New West AMS', 'Ons dorp', 'red-dark', 220, [$br]),
        generateCard(0, 'chance', 24, 'Chance', 'Ons dorp', 'none'),
        generateCard(0, 'street', 25, 'Groenveld Street', 'Ons dorp', 'orange', 220, [$bl, $br]),

        generateCard(0, 'go_prison', 26, 'Prison', '', '', 0, [], 'property--big-tr', 'big'),

        // row 1
        generateCard(1, 'street', 15, 'Waalse Church', 'Ons dorp', 'blue', 170, [$bt, $bb]),
        generateCard(1, 'street', 14, 'Southern Church', 'Ons dorp', 'blue', 170, [$bb]),
        generateCard(1, 'street', 13, 'Diemen', 'Ons dorp', 'none', 200),
        generateCard(1, 'street', 12, 'Amstel Park', 'Ons dorp', 'ocean', 150, [$bt, $bb]),
        generateCard(1, 'street', 11, 'Ooster Park', 'Ons dorp', 'ocean', 130, [$bb]),

        // row 2
        generateCard(2, 'street', 27, 'Bouwes Road', 'Ons dorp', 'orange', 240, [$bt, $bb]),
        generateCard(2, 'street', 28, 'Ruiter Lane', 'Ons dorp', 'orange', 300, [$bb]),
        generateCard(2, 'street', 29, 'Bergen', 'Ons dorp', 'none', 200),
        generateCard(2, 'street', 30, 'Natria Street', 'Ons dorp', 'yellow', 350, [$bt, $bb]),
        generateCard(2, 'street', 31, 'Ali Niknam', 'Ons dorp', 'yellow', 400, [$bb]),

        // row 3
        generateCard(3, 'prison', 10, 'Prison', '', '', 0, [], 'property--big-bl', 'big'),

        generateCard(3, 'street', 9, 'Vondel Park', 'Ons dorp', 'ocean', 120, [$bl, $br]),
        generateCard(3, 'chance', 8, 'Chance', 'Ons dorp', 'none'),
        generateCard(3, 'street', 7, 'Alfa Road', 'Ons dorp', 'lime', 110, [$bl, $br]),
        generateCard(3, 'street', 6, 'Gevel Road', 'Ons dorp', 'lime', 100, [$br]),
        generateCard(3, 'street', 5, 'Osdorp', 'Ons dorp', 'none', 200),
        generateCard(3, 'street', 4, 'Skihut avenue', 'Ons dorp', 'lime', 100, [$bl, $br]),
        generateCard(3, 'chance', 3, 'Chance', 'Ons dorp', 'none'),
        generateCard(3, 'street', 2, 'Pieso Road', 'Ons dorp', 'green-dark', 90, [$bl, $br]),
        generateCard(3, 'street', 1, 'Westeinde', 'Ons dorp', 'green-dark', 60, [$br]),

        generateCard(3, 'start', 0, 'Start', '', '', 0, [], 'property--big-br','big'),
    ]
];