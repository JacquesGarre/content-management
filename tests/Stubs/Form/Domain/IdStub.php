<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Form\Domain;

use App\Form\Domain\Id;
use Faker\Factory;

final class IdStub {

    public static function random(): Id
    {
        $faker = Factory::create();
        $uuid = $faker->uuid();
        return Id::fromString($uuid);
    }
}