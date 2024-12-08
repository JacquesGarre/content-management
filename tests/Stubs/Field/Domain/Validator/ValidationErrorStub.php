<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Field\Domain\Validator;

use App\Field\Domain\Validator\ValidationError;
use App\Tests\Stubs\Translation\Domain\TranslationStub;

final class ValidationErrorStub {

    public static function random(): ValidationError
    {
        $translation = TranslationStub::random();
        return new ValidationError($translation);
    }
}
