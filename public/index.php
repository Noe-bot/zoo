<?php

namespace App;

require __DIR__.'/../vendor/autoload.php';

use Exception;
use DateTime;

/**
 * Enoncé :
 * Un Repas est un contrat qui offre la capacité d'apporter des calories,
 * cette capacité retourne le nombre de calorie qu'elle apporte.
 *
 * La Viande implémente le contrat Repas.
 * Elle est définit par un nombre de calories.
 * Son apport en calorie est son nombre de calorie.
 *
 * Le Feuillage implémente le contrat Repas.
 * Elle est définit par un nombre de calories et un nombre de branches.
 * Son apport en calorie est son nombre de calorie multiplié par son nombre de branches.
 *
 * Un Animal est définit par un nombre de calories qui est à 0 par défaut.
 * Son nombre de calorie est visible de tous.
 * Il a la capacité de manger le Repas qu'on lui donne,
 * ce qui va avoir pour effet d'incrémenter son nombre de calories en fonction du repas manger.
 */

$croco = new Reptile('Croco', new DateTime('2010-01-01'), 4);

$viande = new Viande(500);

dump($croco->nbCalories);

$croco->manger($viande);

dump($croco->nbCalories);

$croco->manger($viande);

dump($croco->nbCalories);

/**---------------------------*/

$dumbo = new Elephant('Dumbo', new DateTime('2008-01-01'), 4);

$baobab = new Feuillage(10, 1000);

dump($dumbo->nbCalories);

$dumbo->manger($baobab);

dump($dumbo->nbCalories);
