<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Field\Domain\Input\Attribute;

use App\Field\Domain\Input\Attribute\Placeholder;
use Faker\Factory;

final class PlaceholderStub {

    public static function random(): Placeholder
    {
        $faker = Factory::create();
        return new Placeholder($faker->word());
    }
}