<?php

/**
 * Class Jeu
 */
class Jeu {

    /**
     * @var int
     */
    private $_nombreTour;
    /**
     * @var array
     */
    private $_actionsPossibles;

    /**
     * Jeu constructor.
     */
    public function __construct() {
        $this->_nombreTour = 1;
        $this->_actionsPossibles = [
            '[S] Se soigner',
            '[B] Ameliorer mon attaque'
        ];
    }

    /**
     * @param Monde $monde
     * @return array
     */
    public function actionsPossibles(Monde $monde){
        $actions = [];
        foreach ($monde->getEnnemis() as $key => $ennemi){
            if($ennemi->isEstEnVie()) {
                array_push($actions, '[' . $key . '] Attaquer ' . $ennemi->getNom());
            }
        }
        return array_merge($actions, $this->_actionsPossibles);
    }

    /**
     * @param Monde $monde
     * @return bool
     */
    public function estFini(Monde $monde) {
        return (empty($monde->getEnnemis()) || !$monde->getJoueur()->isEstEnVie());
    }

    /**
     * @param Monde $monde
     * @return string
     */
    public function tour(Monde $monde) {
        $joueur = $monde->getJoueur();
        $degats = $joueur->degats();
        echo '-------------------------------Tour numero : ' . $this->_nombreTour . "-------------------\n";
        echo 'Actions possibles : ' . "\n";
        foreach($this->actionsPossibles($monde) as $action) {
            echo $action . "\n";
        }
        echo 'Quelle action desirez vous effectuer ?' . "\n";
        $handle = fopen('php://stdin', 'r');
        switch (trim(fgets($handle))) {
            case "S" :
                $joueur->soin();
                break;
            case "B" :
                $joueur->ameliorerDegats();
                break;
            case 0 :
                if(!$joueur->attaque($monde->getEnnemis()[0], $degats)) $monde->removeEnnemi(0);
                break;
            case 1 :
                if(!$joueur->attaque($monde->getEnnemis()[1], $degats)) $monde->removeEnnemi(1);
                break;
            case 2 :
                if(!$joueur->attaque($monde->getEnnemis()[2], $degats)) $monde->removeEnnemi(2);
                break;
            default:
                echo 'This action is not disponible';
                break;
        }
        fclose($handle);

        if(!$joueur->isEstEnVie()) return;

        foreach($monde->getEnnemis() as $ennemi) {
            $ennemi->attaque($joueur, $ennemi->degats());
            echo $ennemi->getNom() . ' (' . $ennemi->getPointsDeVie() . 'pv)' . "\n";
        }

        echo 'Joueur (' . $joueur->getPointsDeVie() . 'pv)' . "\n\n";


        $this->_nombreTour++;
    }

    /**
     * @return int
     */
    public function getNombreTour() {
        return $this->nombreTour;
    }

    /**
     * @param int $nombreTour
     */
    public function setNombreTour($nombreTour) {
        $this->nombreTour = $nombreTour;
    }

    /**
     * @return array
     */
    public function getActionsPossibles() {
        return $this->_actionsPossibles;
    }

    /**
     * @param array $actionsPossibles
     */
    public function setActionsPossibles($actionsPossibles) {
        $this->_actionsPossibles = $actionsPossibles;
    }
}