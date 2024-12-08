<?php

declare(strict_types=1);

namespace App\Tests\Unit\Translation\Domain;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use App\Translation\Domain\English;
use function PHPUnit\Framework\assertEquals;

final class EnglishTest extends TestCase {

    public function testFromString(): void
    {   
        $faker = Factory::create();
        $word = $faker->word();
        $translation = new English($word);
        assertEquals($word, $translation->value);
    }
}