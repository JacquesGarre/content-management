<?php

declare(strict_types=1);

namespace App\Form\Domain;

use App\Form\Domain\Exception\InvalidFormIdException;
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
            throw new InvalidFormIdException("Invalid form id");
        }
    }
}
