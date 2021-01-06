<?php

namespace App;

use DateTime;

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
