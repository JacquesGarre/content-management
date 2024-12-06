<?php

declare(strict_types=1);

namespace App\Field\Domain;

final class Order {

    public function __construct(public readonly int $value)
    {
    }
}
