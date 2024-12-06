<?php

declare(strict_types=1);

namespace App\Tests\Unit\Field\Domain;

use App\Field\Domain\Id;
use App\Field\Domain\Exception\InvalidFieldIdException;
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

    public function testInvalidFieldIdException(): void
    {
        $faker = Factory::create();
        $uuid = $faker->word();
        $this->expectException(InvalidFieldIdException::class);
        Id::fromString($uuid);
    }
}
