<?php

namespace Tests;

use App\Animal;
use App\Elephant;
use App\Reptile;
use App\Viande;
use DateTime;

class AnimalTest extends TestCase
{
    /** @test */
    public function peut_manger_un_repas_quelconque()
    {
        $croco = new Reptile('Croco', new DateTime('2010-01-01'), 4);

        $viande = new Viande(500);

        $this->assertEquals(0, $croco->nbCalories);

        $croco->manger($viande);

        $this->assertEquals(500, $croco->nbCalories);
    }

    /** @test */
    public function peut_donner_son_age()
    {
        $elephant = new Elephant('Bumbo', new \DateTime(), 4);

        $this->assertEquals(0, $elephant->monAge());
    }
}
