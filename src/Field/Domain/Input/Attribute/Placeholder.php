<?php

declare(strict_types=1);

namespace App\Field\Domain\Input\Attribute;

final class Placeholder {

    public function __construct(public readonly string $value)
    {
    }
}