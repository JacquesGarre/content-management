<?php

declare(strict_types=1);

namespace App\Tests\Unit\Field\Domain;

use App\Field\Domain\Input\Value;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class ValueTest extends TestCase {

    public function testValue(): void
    {   
        $faker = Factory::create();
        $word = $faker->word();
        $value = new Value($word);
        assertEquals($word, $value->value);
    }
}
