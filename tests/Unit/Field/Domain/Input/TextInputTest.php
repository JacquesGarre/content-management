<?php

declare(strict_types=1);

namespace App\Tests\Unit\Field\Domain;

use App\Field\Domain\Input\TextInput;
use App\Field\Domain\Validator\Exception\RequiredValueValidationException;
use App\Field\Domain\Validator\Validators;
use App\Tests\Stubs\Field\Domain\Input\Attribute\NameStub;
use App\Tests\Stubs\Field\Domain\Input\ValueStub;
use App\Tests\Stubs\Field\Domain\Validator\RequiredValidatorStub;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNull;

final class TextInputTest extends TestCase {

    public function testEmptyTextInput(): void
    {   
        $name = NameStub::random();
        $input = new TextInput($name);
        assertEquals($name, $input->name);
        assertNull($input->value);
        assertNull($input->validators);
    }

    public function testTextInput(): void
    {   
        $name = NameStub::random();
        $value = ValueStub::random();
        $input = new TextInput($name, $value);
        assertEquals($name, $input->name);
        assertEquals($value, $input->value);
        assertNull($input->validators);
    }

    public function testTextInputValidate(): void
    {   
        $name = NameStub::random();
        $value = null;
        $validator = RequiredValidatorStub::random();
        $validators = new Validators([$validator]);
        $input = new TextInput($name, $value, $validators);
        assertEquals($name, $input->name);
        assertEquals($value, $input->value);
        assertEquals($validators, $input->validators);
        $this->expectException(RequiredValueValidationException::class);
        $input->validateValue();
    }
}
