<?php

declare(strict_types=1);

namespace App\Tests\Unit\Field\Domain;

use App\Field\Domain\Field;
use App\Tests\Stubs\Field\Domain\IdStub;
use App\Tests\Stubs\Field\Domain\Input\TextInputStub;
use App\Tests\Stubs\Field\Domain\LabelStub;
use App\Tests\Stubs\Field\Domain\OrderStub;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNull;

final class FieldTest extends TestCase {

    public function testField(): void
    {
        $id = IdStub::random();
        $label = LabelStub::random();
        $order = OrderStub::random();
        $input = TextInputStub::random();
        $field = new Field($id, $order, $input, $label);
        assertEquals($id, $field->id);
        assertEquals($label, $field->label);
        assertEquals($order, $field->order);
        assertEquals($input, $field->input);
    }

    public function testFieldWithoutLabel(): void
    {
        $id = IdStub::random();
        $order = OrderStub::random();
        $input = TextInputStub::random();
        $field = new Field($id, $order, $input);
        assertEquals($id, $field->id);
        assertNull($field->label);
        assertEquals($order, $field->order);
        assertEquals($input, $field->input);
    }

}