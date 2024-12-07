<?php

declare(strict_types=1);

namespace App\Shared\Style\Domain;

final class CssClass {

    private function __construct(public readonly string $value)
    {
    }
}
