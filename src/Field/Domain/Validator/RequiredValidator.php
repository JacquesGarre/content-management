<?php

declare(strict_types=1);

namespace App\Field\Domain\Validator;

use App\Field\Domain\Input\Value;
use App\Field\Domain\Validator\Exception\RequiredValueValidationException;

final class RequiredValidator extends AbstractValidator {

    public function validate(?Value $value = null): void
    {
        if (!$value || $value->isEmpty()) {
            throw new RequiredValueValidationException(json_encode($this->error->toArray()));
        }
    }
}