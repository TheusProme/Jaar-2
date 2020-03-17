<?php

class Pokemon_attack {
    public $Name;
    public $EnergyType;
    public $Power;
    


    public function __construct($Name, $Power, $EnergyType ) {
        $this->Name = $Name;
        $this->EnergyType = $EnergyType;
        $this->Power = $Power;
    }



    // Voeg een __toString() methode toe aan de class (json_encode gaat opzoek naar de 
    // properties van het object en deze formateren in het json formaat):
    public function __toString() {
        return json_encode($this);
    }
}
