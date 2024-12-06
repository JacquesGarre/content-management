<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Field\Domain\Input;

use App\Field\Domain\Input\Value;
use Faker\Factory;

final class ValueStub {

    public static function random(): Value
    {
        $faker = Factory::create();
        return new Value($faker->word());
    }
}