<?php

declare(strict_types=1);

namespace App\Tests\Unit\Field\Domain\Validator;

use App\Field\Domain\Input\Value;
use App\Field\Domain\Validator\Exception\RequiredValueValidationException;
use App\Field\Domain\Validator\RequiredValidator;
use App\Tests\Stubs\Field\Domain\Input\ValueStub;
use App\Tests\Stubs\Field\Domain\Validator\ValidationErrorStub;
use PHPUnit\Framework\TestCase;

final class RequiredValidatorTest extends TestCase {

    public function testExceptionOnNullValue(): void
    {   
        $error = ValidationErrorStub::random();
        $validator = new RequiredValidator($error);
        $this->expectException(RequiredValueValidationException::class);
        $validator->validate();
    }

    public function testExceptionOnEmptyValue(): void
    {   
        $error = ValidationErrorStub::random();
        $validator = new RequiredValidator($error);
        $value = new Value("");
        $this->expectException(RequiredValueValidationException::class);
        $validator->validate($value);
    }

    public function testSunnyCase(): void
    {   
        $error = ValidationErrorStub::random();
        $validator = new RequiredValidator($error);
        $value = ValueStub::random();
        $this->expectNotToPerformAssertions();
        $validator->validate($value);
    }
}
