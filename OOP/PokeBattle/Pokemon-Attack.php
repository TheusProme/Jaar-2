<?php

class Pokemon_attack extends Pokemon {

// Deze public propertie is standart aan de class:
    // public $Pokemon = $Name;

// Maak een constructor aan in de phpfile class waarmee de waardes van de properties gezet 
// kunnen worden wanneer je een nieuw object aanmaakt gebasseerd op de class:    
    public function __construct($Attacks, $Weakness, $Resistance) {
        parent::__construct($this->Pokemon, $Attacks, $Weakness, $Resistance);
    }
}