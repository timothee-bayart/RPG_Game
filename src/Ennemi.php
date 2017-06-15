<?php

require_once __DIR__ . '/Personnage.php';

/**
 * Class Ennemi
 */
class Ennemi extends Personnage {

    /**
     * Ennemi constructor.
     * @param $nom
     */
    public function __construct($nom) {
        parent::__construct($nom);
    }

    /**
     * @return int
     */
    public function degats() {
        return rand(1, 10);
    }
}