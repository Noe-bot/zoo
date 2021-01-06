<?php

namespace App;

use Exception;

class Eleveur
{
    public string $nom;

    protected array $animaux;

    public function __construct(string $nom, array $animaux)
    {
        $this->nom = $nom;

        foreach ($animaux as $animal) {
            if (! $animal instanceof Animal) {
                throw new Exception("L'éleveur s'occupe des animaux uniquement.");
            }
        }

        if (count($animaux) < 1 || count($animaux) > 10) {
            throw new Exception("Le nombre d'animaux doit être compris entre 1 et 10 inclus.");
        }

        $this->animaux = $animaux;
    }

    public function soigner(): int
    {
        $animauxBlesses = array_filter($this->animaux, function (Animal $animal) {
            return $animal->bonneSante === false;
        });

        foreach ($animauxBlesses as $animal) {
            $animal->bonneSante = true;
        }

        return count($animauxBlesses);
    }
}
