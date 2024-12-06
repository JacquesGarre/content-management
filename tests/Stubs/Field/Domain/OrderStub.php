<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Field\Domain;

use App\Field\Domain\Order;
use Faker\Factory;

final class OrderStub {

    public static function random(): Order
    {
        $faker = Factory::create();
        return new Order($faker->numberBetween(1,10));
    }
}