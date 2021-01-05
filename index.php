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
    public bool $bonneSante = true;

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
