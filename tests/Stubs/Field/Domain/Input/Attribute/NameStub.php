<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Field\Domain\Input\Attribute;

use App\Field\Domain\Input\Attribute\Name;
use Faker\Factory;

final class NameStub {

    public static function random(): Name
    {
        $faker = Factory::create();
        return new Name($faker->word());
    }
}