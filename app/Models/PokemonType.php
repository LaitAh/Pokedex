<?php

namespace Pokedex\Models;

class PokemonType extends CoreModel {

    private $pokemon_numero;
    private $type_id;

    /**
     * Get the value of pokemon_numero
     */ 
    public function getPokemon_numero()
    {
        return $this->pokemon_numero;
    }

    /**
     * Set the value of pokemon_numero
     *
     * @return  self
     */ 
    public function setPokemon_numero($pokemon_numero)
    {
        $this->pokemon_numero = $pokemon_numero;

        return $this;
    }

    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }
}