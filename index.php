<?php

/**
 * Enoncé :
 * Une classe Reptile hérite d'Animal et est définit par un nombre d'écailles (privé).
 *
 * La classe Animal devient une classe abstraite
 * car elle a maintenant la capacité de créer un enfant (public) (Animal),
 * mais la conception va dépendre de ses classes filles.
 *
 * La classe Reptile pour créer un enfant a la capacité de pondre un oeuf (privée).
 * Cette capacité va produire un nouveau Reptile.
 */

abstract class Animal
{
    public string $nom;
    protected DateTime $dateNaissance;
    private int $nbPattes;

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

    abstract public function creerEnfant(): Animal;
}

class Reptile extends Animal
{
    private int $nbEcailles;

    protected function pondreOeuf(): Reptile
    {
        return new Reptile('Croco', new DateTime('2020-01-01'), 4);
    }

    public function creerEnfant(): Animal
    {
        return $this->pondreOeuf();
    }
}

$mamanCroco = new Reptile('Maman Croco',new DateTime('1998-01-01'),4);

var_dump($mamanCroco->monAge());
var_dump($mamanCroco->seDeplacer());
var_dump($mamanCroco->creerEnfant());
