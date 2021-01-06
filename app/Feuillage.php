<?php

namespace App;

class Feuillage implements Repas
{
    protected int $calories;
    protected int $nbBranches;

    public function __construct(int $calories, int $nbBranches)
    {
        $this->calories = $calories;
        $this->nbBranches = $nbBranches;
    }

    public function apporterCalories(): int
    {
        return $this->calories * $this->nbBranches;
    }
}
