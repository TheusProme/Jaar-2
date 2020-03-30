<?php
    require 'PokeBag.php';
    require 'Pokemon.php';
    require 'Pokemon-Attack.php';   
?>

<!DOCTYPE html>

<html lang="nl">

<head>
  <meta charset="utf-8">
  <title>GameBoard PokeBattle</title>
  <meta name="description" content="Theus de Zeeuw">
  <meta name="author" content="SitePoint">
  <meta name=”viewport” content=”width=device-width, initial-scale=1.0″ />

  <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <div class="main-container">
        <div class="inner-container">
        <div class="Start-container">                                       <!-- Start Game -->
            <div class="pokemon Charmender">   
                <button class="choose-Charmender Choose" id="Charmender" onclick="StartBattle('Charmender')">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/004.png" alt="Charmender" width="100" class="Charmender-image">
                </button>
            </div>
            <div class="pokemon Bulbasaur">
                <button class="choose-Bulbasaur Choose" id="Bulbasaur" onclick="StartBattle('Bulbasaur')">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png" alt="Bulbasaur" width="100" class="Bulbasaur-image">
                </button>
            </div>
            <div class="pokemon Squirtle">
                <button class="choose-Squirtle Choose" id="Squirtle" onclick="StartBattle('Squirtle')">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/007.png" alt="Squirtle" width="100" class="Squirtle-image">
                </button>
            </div>
        </div>

        <div class="Battle-container"></div>                                <!-- Battle with Diverse Pokemons -->
        <div class="Winner-container"></div>                                <!-- You defeat all Pokemons -->
        <div class="Lose-container"></div>                                  <!-- You are defeated -->
        </div>
    </div>

    <script>
        function StartBattle(Pokemon_OWN) {
            alert(Pokemon_OWN);
        }
    </script>

</body>

</html>