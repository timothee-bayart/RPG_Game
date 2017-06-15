<?php

require_once __DIR__ . './Personnage.php';

/**
 * Class Joueur
 */
class Joueur extends Personnage {

    /**
     * @var int
     */
    private $_degatsBonus;

    /**
     * Joueur constructor.
     * @param $nom
     */
    public function __construct($nom) {
        parent::__construct($nom);
        $this->_degatsBonus = 0;
    }

    /**
     * @return int
     */
    public function degats() {
        return rand(10, 50) + $this->_degatsBonus;
    }

    /**
     * @return int
     */
    public function soin() {
        $this->_pointsDeVie += rand(10, 30);
        return $this->_pointsDeVie;
    }

    public function ameliorerDegats(){
        $this->setDegatsBonus($this->_degatsBonus += rand(20, 35));
    }

    /**
     * @return int
     */
    public function getDegatsBonus() {
        return $this->_degatsBonus;
    }

    /**
     * @param int $degatsBonus
     */
    public function setDegatsBonus($degatsBonus) {
        $this->_degatsBonus = $degatsBonus;
    }


    /**
     * @param bool $estEnVie
     */
    public function setEstEnVie($estEnVie) {
        $this->_estEnVie = $estEnVie;
    }

    public function attaque(Personnage $personnage, $degat){
        $degat = $degat + $this->_degatsBonus;
        $return = parent::attaque($personnage, $degat);
        $this->_degatsBonus = 0;
        return $return;
    }


}