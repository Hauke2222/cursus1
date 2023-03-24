<?php

$arr = ['kat', 'hond'];
array_push($arr, 'muis', 'konijn', 'vogel');
$arr = array_diff($arr, ['hond']);

echo implode(', ', $arr);
