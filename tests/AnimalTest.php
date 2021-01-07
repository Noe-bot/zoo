<?php

namespace Tests;

use App\Animal;
use App\Elephant;

class AnimalTest extends TestCase
{
    /** @test */
    public function peut_manger_un_repas_quelconque()
    {
        $elephant = new Elephant('Bumbo', new \DateTime(), 4);

        $this->assertInstanceOf(Animal::class, $elephant);
    }

    /** @test */
    public function peut_donner_son_age()
    {
        $elephant = new Elephant('Bumbo', new \DateTime(), 4);

        $this->assertEquals(0, $elephant->monAge());
    }
}
