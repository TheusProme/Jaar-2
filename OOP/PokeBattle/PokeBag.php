<?php

class PokeBag {
    public $Name;
    public $Info;
    


    public function __construct($Name, $Info) {
        $this->Name = $Name;
        $this->Info = $Info;
    }



    // Voeg een __toString() methode toe aan de class (json_encode gaat opzoek naar de 
    // properties van het object en deze formateren in het json formaat):
    public function __toString() {
        return json_encode($this);
    }
}
