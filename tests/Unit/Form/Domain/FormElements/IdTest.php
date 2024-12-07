<?php

declare(strict_types=1);

namespace App\Tests\Unit\Form\Domain\FormElements;

use App\Form\Domain\FormElements\Exception\InvalidFormElementIdException;
use App\Form\Domain\FormElements\Id;
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

    public function testInvalidFormElementIdException(): void
    {
        $faker = Factory::create();
        $uuid = $faker->word();
        $this->expectException(InvalidFormElementIdException::class);
        Id::fromString($uuid);
    }
}
