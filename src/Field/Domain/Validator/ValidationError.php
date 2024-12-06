<?php

declare(strict_types=1);

namespace App\Field\Domain\Validator;

use App\Shared\Translation\Domain\Translation;

final class ValidationError {

    public function __construct(public readonly Translation $value)
    {   
    }

    public function toArray() {
        return $this->value->toArray();
    }
}