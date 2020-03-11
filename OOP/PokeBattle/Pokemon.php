<?php

class Pokemon {

// Voeg 4 public properties toe aan de class:
    public $name;
    public $EnergyType;
    public $hitpoints; 
    public $health;
    public $Attacks;
    public $Weakness;
    public $Resistance;


// Maak een constructor aan in de phpfile class waarmee de waardes van de 4 properties gezet 
// kunnen worden wanneer je een nieuw object aanmaakt gebasseerd op de Superhero class:
    public function __construct($name, $EnergyType, $hitpoints, $health, $Attacks, $Weakness, $Resistance) {
        $this->name = $name;
        $this->EnergyType = $EnergyType;
        $this->hitpoints = $hitpoints;
        $this->health = $hitpoints;
        $this->Attacks = $Attacks;
        $this->Weakness = $Weakness;
        $this->Resistance = $Resistance;
    }

// Voeg de volgende methode toe aan de class:
    // public function sayOneliner() {
    //     echo '<h2>' . $this->health . '</h2>';
    // }

// Voeg een __toString() methode toe aan de class (json_encode gaat opzoek naar de 
// properties van het object en deze formateren in het json formaat):
    public function __toString() {
        return json_encode($this);
    }
}

