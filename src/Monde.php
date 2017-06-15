<?php

/**
 * Class Monde
 */
class Monde {

    /**
     * @var
     */
    private $_joueur;
    /**
     * @var
     */
    private $_ennemis;

    /**
     * Monde constructor.
     * @param $joueur
     * @param $ennemis
     */
    public function __construct($joueur, $ennemis) {
        $this->_joueur = $joueur;
        $this->_ennemis = $ennemis;
    }

    /**
     * @return mixed
     */
    public function ennemisEnVie(){
        return $this->_ennemis;
    }

    /**
     * @return mixed
     */
    public function getJoueur() {
        return $this->_joueur;
    }

    /**
     * @param mixed $joueur
     */
    public function setJoueur($joueur) {
        $this->_joueur = $joueur;
    }

    /**
     * @return mixed
     */
    public function getEnnemis() {
        return $this->_ennemis;
    }

    /**
     * @param mixed $ennemis
     */
    public function setEnnemis($ennemis) {
        $this->_ennemis = $ennemis;
    }

    public function removeEnnemi($index) {
        unset($this->_ennemis[$index]);
    }

}