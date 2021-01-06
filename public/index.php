<?php

namespace App;

require __DIR__.'/../vendor/autoload.php';

use Exception;
use DateTime;

/**
 * Enoncé :
 * Un Animal a un état de santé true par défaut, false s'il se blesse. (visibilité public).
 * Il a donc la capacité de se blesser (public).
 *
 * Un éleveur est définit par un nom (public).
 * Il a en charge au moins 1 jusqu'à 10 animaux.
 *
 * Il dispose de la capacité de soigner ses animaux tous d'un coup s'ils sont blessés (public).
 * Le résultat de cette méthode sera le nombre d'animaux soignés.
 */

try {
    $eleveur = new Eleveur('John', []);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $eleveur = new Eleveur('Bob', [
        new DateTime(),
    ]);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

$serpent = new Serpent('Maman Dumbo', new DateTime('2005-01-01'));
$serpent->seBlesser();

$elephant = new Elephant('Dumbo', new DateTime('2008-01-01'), 4);
$elephant->seBlesser();

$reptile = new Reptile('Croco', new DateTime('2010-01-01'), 4);

$animaux = [
    $serpent,
    $elephant,
    $reptile,
];

$eleveur = new Eleveur('Robert', $animaux);

var_dump($eleveur->soigner());
var_dump($eleveur->soigner());
