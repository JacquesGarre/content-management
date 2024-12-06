<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Field\Domain\Validator;

use App\Field\Domain\Validator\Validators;

final class ValidatorsStub {

    public static function random(): Validators
    {
        $validator = RequiredValidatorStub::random();
        return new Validators([$validator]);
    }
}
