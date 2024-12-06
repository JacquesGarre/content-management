<?php

declare(strict_types=1);

namespace App\Field\Domain\Validator;

final class Validators {

    public function __construct(public readonly array $value)
    {
    }
}