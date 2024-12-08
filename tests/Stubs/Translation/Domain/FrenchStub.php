<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Translation\Domain;

use App\Translation\Domain\French;
use Faker\Factory;

final class FrenchStub {

    public static function random(): French
    {
        $faker = Factory::create();
        $word = $faker->word();
        return new French($word);
    }
}