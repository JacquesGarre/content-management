<?php

declare(strict_types=1);

namespace App\Tests\Unit\Form\Domain\FormElements;

use App\Form\Domain\FormElements\Order;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class OrderTest extends TestCase {

    public function testOrder(): void
    {   
        $faker = Factory::create();
        $number = $faker->numberBetween(0, 10);
        $order = new Order($number);
        assertEquals($number, $order->value);
    }
}
