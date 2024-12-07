<?php

declare(strict_types=1);

namespace App\Form\Domain;

use App\Shared\Translation\Domain\Translation;

final class SubmitButtonLabel {

    private function __construct(public readonly Translation $value)
    {
    }

    public static function fromTranslation(Translation $value): self
    {
        return new self($value);
    }
}
