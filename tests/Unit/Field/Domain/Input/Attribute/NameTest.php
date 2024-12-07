<?php

declare(strict_types=1);

namespace App\Tests\Unit\Field\Domain\Input\Attribute;

use App\Field\Domain\Input\Attribute\Name;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class NameTest extends TestCase {

    public function testName(): void
    {   
        $faker = Factory::create();
        $word = $faker->word();
        $name = new Name($word);
        assertEquals($word, $name->value);
    }
}
