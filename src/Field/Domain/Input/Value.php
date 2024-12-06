<?php

declare(strict_types=1);

namespace App\Field\Domain\Input;

final class Value {
    
    public function __construct(public readonly ?string $value = null)
    {
    }

    public function isEmpty(): bool
    {
        return !$this->value || strlen($this->value) === 0;
    }
}