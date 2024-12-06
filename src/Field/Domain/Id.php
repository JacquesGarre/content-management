<?php

declare(strict_types=1);

namespace App\Field\Domain;

use App\Field\Domain\Exception\InvalidFieldIdException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class Id {

    private function __construct(public readonly UuidInterface $value)
    {
    }

    public static function fromString(string $value): self 
    {
        self::assertValid($value);
        $uuid = Uuid::fromString($value);
        return new self($uuid);
    }

    public static function assertValid(string $value): void
    {
        if (!Uuid::isValid($value)) {
            throw new InvalidFieldIdException("Invalid field id");
        }
    }
}
