<?php

namespace App;

use DateTime;

abstract class Animal
{
    public string $nom;
    protected DateTime $dateNaissance;
    private int $nbPattes;
    public bool $bonneSante = true;
    public int $nbCalories = 0;

    public function __construct(string $nom, DateTime $dateNaissance, int $nbPattes)
    {
        $this->nom = $nom;
        $this->dateNaissance = $dateNaissance;
        $this->nbPattes = $nbPattes;
    }

    public function monAge(): int
    {
        return date('Y') - $this->dateNaissance->format('Y');
    }

    public function seDeplacer(): int
    {
        $time = 15;

        return ( 10 * $this->nbPattes) / $time;
    }

    public function seBlesser(): void
    {
        $this->bonneSante = false;
    }

    public function manger(Repas $repas)
    {
        $this->nbCalories += $repas->apporterCalories();
    }

    abstract public function creerEnfant(): Animal;
}
