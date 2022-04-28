<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;

/**
 * Le MainController est le controlleur qui gère les pages principales
 * Le MainController hérite du CoreController afin d'avoir accès à la méthode show
 */
class MainController extends CoreController {

    /**
     * Méthode gérant la page d'accueil
     *
     * @return void
     */
    public function home()
    {
        $pokemonModel = new Pokemon;
        $pokemons = $pokemonModel->listPokemon();

        // On se crée un tableau contenant les infos à transmettre à la vue
        $viewData = [
            'pokemons' => $pokemons
        ];

        $this->show('home', $viewData);
    }
}