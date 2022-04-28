<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Pokemon extends CoreModel {

    private $nom;
    private $pv;
    private $attaque;
    private $defense;
    private $attaque_spe;
    private $defense_spe;
    private $vitesse;
    private $numero;

    /**
     * Méthode permettant de récupérer toutes les informations du tableau pokemon dans la BDD
     *
     * @return void
     */
    public function listPokemon()
    {
        $sql = "SELECT * FROM `pokemon`";

        // On se connecte à la BDD via un outil qu'on nous a fourni et qui nous renvoie un objet PDO.
        $pdo = Database::getPDO();

        // On transmet la requete à notre BDD via la méthod query
        $pdoStatement = $pdo->query($sql);

        // FetchAll permet de récupérer un tableau avec tous les résultats. L'argument PDO::FETCH_CLASS permet de transformer chaque entrée du tableau en un objet issu de la classe passée en 2nd argument, ici Pokemon.
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $result;
    }

    /**
     * Méthode permettant de récupérer les informations d'un pokémon en particulier
     *
     * @param int $numero
     * @return void
     */
    public function attrapezEnUn($numero) 
    {
        $sql = "SELECT * FROM `pokemon` WHERE `numero` = " . $numero;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $pokemon = $pdoStatement->fetchObject(self::class);

        return $pokemon;
    }

    public function findByType($type_id)
    {
        // Version avec jointure
        // $sql = "SELECT * FROM `pokemon` 
        //         INNER JOIN `pokemon_type` 
        //         ON `pokemon`.`numero` = `pokemon_type`.`pokemon_numero` 
        //         WHERE `type_id` = " . $type_id;

        $sql = "SELECT * FROM `pokemon`
                WHERE `numero` IN (
                    SELECT `pokemon_numero` FROM `pokemon_type`
                    WHERE `type_id` = " . $type_id . ")";

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $pokemonsByType = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $pokemonsByType;

    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of pv
     */ 
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * Set the value of pv
     *
     * @return  self
     */ 
    public function setPv($pv)
    {
        $this->pv = $pv;

        return $this;
    }

    /**
     * Get the value of attaque
     */ 
    public function getAttaque()
    {
        return $this->attaque;
    }

    /**
     * Set the value of attaque
     *
     * @return  self
     */ 
    public function setAttaque($attaque)
    {
        $this->attaque = $attaque;

        return $this;
    }

    /**
     * Get the value of defense
     */ 
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     *
     * @return  self
     */ 
    public function setDefense($defense)
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get the value of attaque_spe
     */ 
    public function getAttaque_spe()
    {
        return $this->attaque_spe;
    }

    /**
     * Set the value of attaque_spe
     *
     * @return  self
     */ 
    public function setAttaque_spe($attaque_spe)
    {
        $this->attaque_spe = $attaque_spe;

        return $this;
    }

    /**
     * Get the value of defense_spe
     */ 
    public function getDefense_spe()
    {
        return $this->defense_spe;
    }

    /**
     * Set the value of defense_spe
     *
     * @return  self
     */ 
    public function setDefense_spe($defense_spe)
    {
        $this->defense_spe = $defense_spe;

        return $this;
    }

    /**
     * Get the value of vitesse
     */ 
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * Set the value of vitesse
     *
     * @return  self
     */ 
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }
}