<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Translation\Domain;

use App\Translation\Domain\English;
use Faker\Factory;

final class EnglishStub {

    public static function random(): English
    {
        $faker = Factory::create();
        $word = $faker->word();
        return new English($word);
    }
}