<?php

require 'Pokemon.php';
require 'Pokemon-Attack.php';

// Maak een nieuw object aan gebasseerd op de class en geef de benodigde waarden mee als parameter:
    $Pikachu =  new Pokemon('Pikachu', 'Lightning', '60');
    // $Charmeleon =  new Pokemon('Charmeleon', 'Fire', '60', ['Head Butt', 'Flare'], 'Water', 'Lightning');

    print_r('<pre>'. $Pikachu . '</pre>');

    $Pikachu_Attack = new Pokemon_attack(['Electric Ring', 'Pika Punch'], 'Fire', 'Fighting');

    print_r('<pre>' . $Pikachu_Attack . '</pre>');