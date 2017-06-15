<?php

require_once __DIR__ . '/src/Ennemi.php';
require_once __DIR__ . '/src/Jeu.php';
require_once __DIR__ . '/src/Joueur.php';
require_once __DIR__ . '/src/Monde.php';

$jeu = new Jeu();
$joueur = new Joueur('Jean-Michel Paladin');
$ennemis = [
    new Ennemi('Balrog'),
    new Ennemi('Gobelin'),
    new Ennemi('Nain')
];
$monde = new Monde($joueur, $ennemis);

while(!$jeu->estFini($monde))
    $jeu->tour($monde);

echo 'PARTIE TERMINEE \n';
