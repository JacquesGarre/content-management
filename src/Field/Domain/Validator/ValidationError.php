<?php

declare(strict_types=1);

namespace App\Field\Domain\Validator;

use App\Shared\Translation\Domain\Translation;

final class ValidationError {

    public function __construct(public readonly Translation $value)
    {   
    }

    public function toArray() {
        $translation = $this->value->toArray();
        unset($translation['id']);
        return $translation;
    }
}