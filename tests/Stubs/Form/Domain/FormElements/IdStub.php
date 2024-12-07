<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Form\Domain\FormElements;

use App\Form\Domain\FormElements\Id;
use Faker\Factory;

final class IdStub {

    public static function random(): Id
    {
        $faker = Factory::create();
        $uuid = $faker->uuid();
        return Id::fromString($uuid);
    }
}