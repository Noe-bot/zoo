<?php

namespace App;

use DateTime;

class Elephant extends Animal
{
    public function creerEnfant(): Animal
    {
        return new Elephant('Dumbo', new DateTime(), 4);
    }
}
