<?php

declare(strict_types=1);

namespace App\Tests\Unit\Shared\Translation\Domain;

use App\Shared\Translation\Domain\Id;
use App\Shared\Translation\Domain\Exception\InvalidTranslationIdException;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class IdTest extends TestCase {

    public function testFromString(): void
    {   
        $faker = Factory::create();
        $uuid = $faker->uuid();
        $id = Id::fromString($uuid);
        assertEquals($uuid, $id->value);
    }

    public function testInvalidTranslationIdException(): void
    {
        $faker = Factory::create();
        $uuid = $faker->word();
        $this->expectException(InvalidTranslationIdException::class);
        Id::fromString($uuid);
    }
}
