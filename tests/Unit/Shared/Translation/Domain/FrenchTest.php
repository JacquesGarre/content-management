<?php

declare(strict_types=1);

namespace App\Tests\Unit\Shared\Translation\Domain;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use App\Shared\Translation\Domain\French;
use function PHPUnit\Framework\assertEquals;

final class FrenchTest extends TestCase {

    public function testFromString(): void
    {   
        $faker = Factory::create();
        $word = $faker->word();
        $translation = new French($word);
        assertEquals($word, $translation->value);
    }
}