<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

/**
 * PokemonController gère les pages de détails des pokemon
 */
class PokemonController extends CoreController {
    
    /**
     * Méthode gérant la page de détail d'un pokémon
     *
     * @return void
     */
    public function pokemon($params) {

        $pokemonModel = new Pokemon; 
        $pokemonData = $pokemonModel->attrapezEnUn($params['numero']);

        $typeModel = new Type;
        $pokemonType = $typeModel->findByPokemonNumber($params['numero']);

        $viewData = [
            'pokeData' => $pokemonData,
            'pokeType' => $pokemonType,
        ];

        $this->show('pokemon_detail', $viewData);
    }

    /**
     * Méthode gérant la page des types
     *
     * @return void
     */
    public function types()
    {
        $typeModel = new Type;
        $allTypes = $typeModel->findAll();

        $viewData = [
            'types' => $allTypes,
        ];

        $this->show('types', $viewData);
    }

    /**
     * Méthode gérant la page affichant tous les pokémons d'un même type
     *
     * @return void
     */
    public function pokemonTypes($params)
    {
        $pokemonModel = new Pokemon; 
        $pokemonsByType = $pokemonModel->findByType($params['type_id']);

        $typeModel = new Type;
        $pokemonTypeName = $typeModel->findTypeName($params['type_id']);
 
        $viewData = [
            'pokemonsByType' => $pokemonsByType,
            'pokemonTypeName' => $pokemonTypeName,
        ];

        $this->show('pokemon_types', $viewData);
    }

}