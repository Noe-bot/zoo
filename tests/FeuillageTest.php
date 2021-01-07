<?php

namespace Tests;

use App\Feuillage;

class FeuillageTest extends TestCase
{
    /** @test */
    public function peut_apporter_des_calories()
    {
        $feuillage = new Feuillage(10, 100);

        $calorie = $feuillage->apporterCalories();

        $this->assertEquals(1000, $calorie);
    }
}
