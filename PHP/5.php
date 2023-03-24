<?php

function greet($name)
{
    $hour = date('G');

    if ($hour >= 6 && $hour < 12) {
        $greeting = 'Goedemorgen';
    } elseif ($hour >= 12 && $hour < 18) {
        $greeting = 'Goedemiddag';
    } elseif ($hour >= 18 && $hour < 24) {
        $greeting = 'Goedenavond';
    } else {
        $greeting = 'Goedenacht';
    }

    echo "$greeting $name, het is vandaag " . date('d-m-Y H:i');
}

greet('Reinier');
