<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Field\Domain\Input;

use App\Field\Domain\Input\TextInput;
use App\Tests\Stubs\Field\Domain\Input\Attribute\NameStub;
use App\Tests\Stubs\Field\Domain\Validator\ValidatorsStub;

final class TextInputStub {

    public static function random(): TextInput
    {
        $name = NameStub::random();
        $value = ValueStub::random();
        $validators = ValidatorsStub::random();
        return new TextInput($name, $value, $validators);
    }
}