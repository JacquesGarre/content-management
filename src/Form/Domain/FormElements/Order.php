<?php

declare(strict_types=1);

namespace App\Form\Domain\FormElements;

final class Order {

    public function __construct(public readonly int $value)
    {
    }
}
