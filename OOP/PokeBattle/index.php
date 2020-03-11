<?php

require 'Pokemon.php';


// Maak een nieuw object aan gebasseerd op de class en geef de benodigde waarden mee als parameter:
    $Pikachu =  new Pokemon('Pikachu', 'Lightning', '60', ['Electric Ring', 'Pika Punch'], 'Fire', 'Fighting');
    $Charmeleon =  new Pokemon('Charmeleon', 'Fire', '60', ['Head Butt', 'Flare'], 'Water', 'Lightning');
    print_r('<pre>'. $Pikachu . '</pre>');

    // $Pikachu->sayOneliner();
