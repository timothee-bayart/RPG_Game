<?php

/**
 * Class Personnage
 */
abstract class Personnage {

    /**
     * @var
     */
    protected $_nom;

    /**
     * @var int
     */
    protected $_pointsDeVie;

    /**
     * @var bool
     */
    protected $_estEnVie;

    /**
     * Personnage constructor.
     * @param $nom
     */
    public function __construct($nom) {
        $this->_nom = $nom;
        $this->_pointsDeVie = 100;
        $this->_estEnVie = true;
    }

    /**
     * @return string
     */
    public function info(){
        return ($this->_estEnVie) ? $this->_nom.' ('.$this->_pointsDeVie.')' : $this->_nom.' (Vaincu)';
    }

    /**
     * @param Personnage $personnage
     * @return int|string
     */
    public function attaque(Personnage $personnage, $degat){
        return $personnage->subitAttaque($degat);
    }

    /**
     * @param $degatsRecus
     * @return int|string
     */
    public function subitAttaque($degatsRecus){
        $this->_pointsDeVie -= $degatsRecus;
        if ($this->_pointsDeVie <= 0) $this->_estEnVie = false;
        return $this->_estEnVie;
    }

    /**
     * @return mixed
     */
    public function getNom() {
        return $this->_nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom) {
        $this->_nom = $nom;
    }

    /**
     * @return int
     */
    public function getPointsDeVie() {
        return $this->_pointsDeVie;
    }

    /**
     * @param int $pointsDeVie
     */
    public function setPointsDeVie($pointsDeVie) {
        $this->_pointsDeVie = $pointsDeVie;
    }

    /**
     * @return bool
     */
    public function isEstEnVie() {
        return $this->_estEnVie;
    }

    /**
     * @param bool $estEnVie
     */
    public function setEstEnVie($estEnVie) {
        $this->_estEnVie = $estEnVie;
    }
}