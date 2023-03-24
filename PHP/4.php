<?php
$arr = [
    'kat' => 1,
    'hond' => 1,
];

$arr['muis'] = 2;
$arr['konijn'] = 30;
$arr['vogel'] = 10;

unset($arr['hond']);

echo implode(', ', array_keys($arr));
