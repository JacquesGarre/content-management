<?php

declare(strict_types=1);

namespace App\Shared\Translation\Infrastructure\Persistence\Types;

use App\Shared\Translation\Domain\Id;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class IdType extends Type
{
    public const NAME = 'id_type'; 

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return $platform->getGuidTypeDeclarationSQL($fieldDeclaration);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Id
    {
        return $value !== null ? new Id($value) : null;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if ($value instanceof Id) {
            return $value->toString();
        }
        return $value;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
