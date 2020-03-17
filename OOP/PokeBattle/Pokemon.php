<?php

class Pokemon {

/** @var array $pokemons */
public static $pokemons = [];

// Voeg 4 public properties toe aan de class:
    public $Name;
    public $EnergyType;
    public $hitpoints; 
    public $Attacks;
    public $Weakness;
    public $Resistance;


// Maak een constructor aan in de phpfile class waarmee de waardes van de 4 properties gezet 
// kunnen worden wanneer je een nieuw object aanmaakt gebasseerd op de Superhero class:
    public function __construct($Name, $EnergyType, $hitpoints, $Attacks, $Weakness, $Resistance) {
        $this->Name = $Name;
        $this->EnergyType = $EnergyType;
        $this->hitpoints = $hitpoints;
        $this->health = $hitpoints;
        $this->Attacks = $Attacks;
        $this->Weakness = $Weakness;
        $this->Resistance = $Resistance;

        array_push(self::$pokemons, $this);
    }

    public function getAttack(string $name): Pokemon_attack {
        foreach ($this->Attacks as $attack) {
            if ($attack->Name == $name) {
                return $attack;
            }
        }
        return null;
    }

    public function attack(Pokemon $target, Pokemon_attack $attack): void {
        $Power = $attack->Power;

        if ($target->Weakness == $attack->EnergyType) {
            $Power = $Power*2; 
        } elseif ($target->Resistance == $attack->EnergyType) {
            $Power = $Power/2;
        }

        $target->health-= $Power;
    }

    public static function getPopulation(): array {
        $alive = [];
        foreach (self::$pokemons as $pokemon) {
            if ($pokemon->health > 0) {
                array_push($alive, $pokemon);
            }
        }
        return $alive;
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

