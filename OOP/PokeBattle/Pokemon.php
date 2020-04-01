<?php

class Pokemon {

/** @var array $pokemons */
public static $pokemons = [];

// Voeg 4 public properties toe aan de class:
    private $Name;
    private $EnergyType;
    private $hitpoints; 
    private $Attacks;
    private $Weakness;
    private $Resistance;


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

// Haal de Attacks op van de Attack class:
    public function getAttack(string $name): Pokemon_attack {
        foreach ($this->Attacks as $attack) {
            if ($attack->Name == $name) {
                return $attack;
            }
        }
        return null;
    }

// Zet de aanval in:
    public function attack(Pokemon $target, Pokemon_attack $attack): void {
        $Power = $attack->Power;

        if ($target->Weakness == $attack->EnergyType) {
            $Power = $Power*2; 
        } elseif ($target->Resistance == $attack->EnergyType) {
            $Power = $Power/2;
        }

        //
        $target->setHealth($Power);
    }

    public function setHealth($power){
        $this->health -= $power;
    }

    public static function getPopulation(): array {
        $alive = [];
        foreach (self::$pokemons as $pokemon) {
            if ($pokemon->health > 0) {
                array_push($alive, $pokemon->Name);
            }
        }
        return $alive;
    }


    public function getPropertie(string $Propertie){
        // echo "<br>". $Propertie. " <-----";
        
        return $this->$Propertie;
    }


    public static function getPopulationHealth(){
        $alive = [];
        foreach (self::$pokemons as $pokemon) {
            if ($pokemon->health > 0) {
                array_push($alive, $pokemon->health);
            }
        }
        $total = array_sum($alive);
        return $total/count($alive);
    }

    public static function PushToPokeBag($name){
        $PokeBag = [];
        array_push($PokeBag, $name);
    }


// Voeg een __toString() methode toe aan de class (json_encode gaat opzoek naar de 
// properties van het object en deze formateren in het json formaat):
    public function __toString() {
        return json_encode($this);
    }
}

