<?php

/**
 * Enoncé :
 * La classe Serpent hérite de Reptile.
 * Un serpent a un nombre de pattes définit à 0.
 * Un serpent est aussi définit par sa peau (privée) qui est par défaut neuve.
 *
 * Le calcule de sa vitesse est basé sur le statut de sa peau
 * Si elle est neuve, il avance à la vitesse 50
 * Sinon il avance à 30
 * A la fin de son déplacement sa peau passe au statut usée.
 *
 * Il a la capacité de muer (public) ce qui rend sa peau neuve.
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

$serpent = new Serpent('Snake', new DateTime('2005-01-01'));

var_dump($serpent->seDeplacer());
var_dump($serpent->seDeplacer());
$serpent->muer();
var_dump($serpent->seDeplacer());
