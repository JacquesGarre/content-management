<?php

declare(strict_types=1);

namespace App\Shared\Translation\Domain;

use App\Shared\Translation\Domain\Exception\InvalidTranslationIdException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class Id {

    private function __construct(public readonly UuidInterface $value)
    {
    }

    public function toString(): string {
        return $this->value->toString();
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
            throw new InvalidTranslationIdException("Invalid translation id");
        }
    }
}
