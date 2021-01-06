<?php

namespace App;

class Viande implements Repas
{
    protected int $calories;

    public function __construct(int $calories)
    {
        $this->calories = $calories;
    }

    public function apporterCalories(): int
    {
        return $this->calories;
    }
}
