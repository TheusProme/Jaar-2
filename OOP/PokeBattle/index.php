<?php

require 'Pokemon.php';
require 'Pokemon-Attack.php';

// $Pokemons = [];

// Maak een nieuw object aan gebasseerd op de class en geef de benodigde waarden mee als parameter:
    $Pikachu =  new Pokemon('Pikachu', 'Lightning', '60', [new Pokemon_attack('Electric Ring', 50, 'Lightning'), new Pokemon_attack('Pika Punch', 20, 'Lightning')], 'Water', 'Lightning');
    $Charmeleon =  new Pokemon('Charmeleon', 'Fire', '60', [new Pokemon_attack('Head Butt', 10, 'Fire'), new Pokemon_attack('Flare', 30, 'Fire')], 'Water', 'Lightning');
    
    // array_push($Pokemons, $Pikachu, $Charmeleon);
    
    // print_r('<pre>'. $Pikachu . '</pre>');
    // print_r('<pre>'. $Charmeleon . '</pre>');

    $Pikachu->attack($Charmeleon, $Pikachu->getAttack("Electric Ring"));

    print_r('<pre>'. $Charmeleon . '</pre>');

    $Charmeleon->attack($Pikachu, $Charmeleon->getAttack("Flare"));

    print_r('<pre>'. $Pikachu . '</pre>');

    print_r(json_encode(Pokemon::getPopulation()));