<?php

/**
 * Enoncé :
 * La classe Elephant hérite de Animal.
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

class Serpent extends Reptile
{
    private int $nbPattes = 0;
    private string $peau = 'neuve';

    public function __construct(string $nom, DateTime $dateNaissance)
    {
        parent::__construct($nom, $dateNaissance, 0);
    }

    public function seDeplacer(): int
    {
        if ($this->peau === 'neuve') {
            $vitesse = 50;
        } else {
            $vitesse = 30;
        }

        $this->peau = 'usée';

        return $vitesse;
    }

    public function muer(): void
    {
        $this->peau = 'neuve';
    }
}

class Elephant extends Animal
{
    public function creerEnfant(): Animal
    {
        return new Elephant('Dumbo', new DateTime(), 4);
    }
}

$elephant = new Elephant('Maman Dumbo', new DateTime('2005-01-01'), 4);

var_dump($elephant->creerEnfant());
