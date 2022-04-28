<?php

namespace Pokedex\Models;

use PDO;
use Pokedex\Utils\Database;

class Type extends CoreModel {

    private $name;
    private $color;

    public function findAll()
    {
        $sql = "SELECT * FROM `type`";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $types;
    }

    public function findByPokemonNumber($numero)
    {
        $sql = "SELECT * FROM `type`
                WHERE `id` IN (
                    SELECT `type_id` FROM `pokemon_type`
                    WHERE `pokemon_numero` = " . $numero . ")";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $types;
    }

    public function findTypeName($type_id)
    {
        $sql = "SELECT `name` FROM `type` WHERE `id` = " . $type_id;
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $typeName = $pdoStatement->fetchObject(self::class);

        return $typeName;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}