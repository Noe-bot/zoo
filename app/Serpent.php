<?php

namespace App;

use DateTime;

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
