<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Field\Domain\Validator;

use App\Field\Domain\Validator\RequiredValidator;

final class RequiredValidatorStub {

    public static function random(): RequiredValidator
    {
        $error = ValidationErrorStub::random();
        return new RequiredValidator($error);
    }
}
