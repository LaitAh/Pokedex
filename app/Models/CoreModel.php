<?php

namespace Pokedex\Models;

class CoreModel {

    // On évite de répéter les propriétés communes à TOUS les models dans chaque model. On vient les extraire et les définir dans un model parent : CoreModel.
    // Ces propriétés étaient privées, mais si on garde cette visibilité, les enfants ne les verront pas. On les passe donc en protected, afin qu'elles soient héritables.
    protected $id;

    // De même avec les méthodes qui sont communes à tous les models, on les factorise dans le CoreModel.
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    
}