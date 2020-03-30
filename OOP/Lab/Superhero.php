<?php

class Superhero {

// Voeg 4 public properties toe aan de class:
    public $name;
    public $gender; 
    public $team;
    public $oneline;

// Maak een constructor aan in de phpfile class waarmee de waardes van de properties gezet 
// kunnen worden wanneer je een nieuw object aanmaakt gebasseerd op de Superhero class:
    public function __construct($name, $gender, $team, $oneliner) {
        $this->name = $name;
        $this->gender = $gender;
        $this->team = $team;
        $this->oneliner = $oneliner;
    }

// Voeg de volgende methode toe aan de class:
    public function sayOneliner() {
        echo '<h2>' . $this->oneliner . '</h2>';
    }

// Voeg een __toString() methode toe aan de class (json_encode gaat opzoek naar de 
// properties van het object en deze formateren in het json formaat):
    public function __toString() {
        return json_encode($this);
    }
}

