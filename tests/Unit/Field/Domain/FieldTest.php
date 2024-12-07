<?php

declare(strict_types=1);

namespace App\Tests\Unit\Field\Domain;

use App\Field\Domain\Field;
use App\Field\Domain\Input\TextInput;
use App\Field\Domain\Validator\Exception\RequiredValueValidationException;
use App\Tests\Stubs\Field\Domain\Input\Attribute\NameStub;
use App\Tests\Stubs\Field\Domain\Input\TextInputStub;
use App\Tests\Stubs\Field\Domain\LabelStub;
use App\Tests\Stubs\Field\Domain\Validator\ValidatorsStub;
use App\Tests\Stubs\Form\Domain\FormElements\IdStub;
use App\Tests\Stubs\Form\Domain\FormElements\OrderStub;
use App\Tests\Stubs\Form\Domain\IdStub as FormIdStub;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNull;

final class FieldTest extends TestCase {

    public function testField(): void
    {
        $id = IdStub::random();
        $formId = FormIdStub::random();
        $label = LabelStub::random();
        $order = OrderStub::random();
        $input = TextInputStub::random();
        $field = new Field(id: $id, formId: $formId, order: $order, input: $input, label: $label);
        assertEquals($id, $field->id);
        assertEquals($formId, $field->formId);
        assertNull($field->cssClass);
        assertEquals($label, $field->label);
        assertEquals($order, $field->order);
        assertEquals($input, $field->input);
    }

    public function testFieldWithoutLabel(): void
    {
        $id = IdStub::random();
        $formId = FormIdStub::random();
        $order = OrderStub::random();
        $input = TextInputStub::random();
        $field = new Field(id: $id, formId: $formId, order: $order, input: $input);
        assertEquals($id, $field->id);
        assertEquals($formId, $field->formId);
        assertNull($field->label);
        assertNull($field->cssClass);
        assertEquals($order, $field->order);
        assertEquals($input, $field->input);
    }

    public function testFieldValidateSunnyCase(): void
    {
        $id = IdStub::random();
        $formId = FormIdStub::random();
        $label = LabelStub::random();
        $order = OrderStub::random();
        $input = TextInputStub::random();
        $field = new Field(id: $id, formId: $formId, order: $order, input: $input, label: $label);
        $this->expectNotToPerformAssertions();
        $field->validate();
    }

    public function testFieldValidateException(): void
    {
        $id = IdStub::random();
        $formId = FormIdStub::random();
        $label = LabelStub::random();
        $order = OrderStub::random();
        $name = NameStub::random();
        $validators = ValidatorsStub::random();
        $input = new TextInput(
            name: $name, 
            validators: $validators,
        );
        $field = new Field(id: $id, formId: $formId, order: $order, input: $input, label: $label);
        $this->expectException(RequiredValueValidationException::class);
        $field->validate();
    }
}