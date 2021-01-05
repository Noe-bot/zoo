<?php

/**
 * Enoncé :
 * Une classe Animal définit par un nom (public),
 * une date de naissance (protégée) et un nombre de pattes (privé).
 *
 * Animal a la capacité de donner son age (public) (entier)
 * et de se déplacer à une certaine vitesse (v = d / t) (d = 10 * pattes) (public) (entier)
 *
 */

class Animal
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
}

$dumbo = new Animal('Dumbo',new DateTime('1998-01-01'),4);

var_dump($dumbo->monAge());
var_dump($dumbo->seDeplacer());
