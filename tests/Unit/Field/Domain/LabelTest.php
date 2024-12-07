<?php

declare(strict_types=1);

namespace App\Tests\Unit\Field\Domain;

use App\Field\Domain\Label;
use App\Tests\Stubs\Field\Domain\OrderStub;
use App\Tests\Stubs\Shared\Translation\Domain\TranslationStub;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class LabelTest extends TestCase {

    public function testFromTranslation(): void
    {   
        $order = OrderStub::random();
        $translation = TranslationStub::random();
        $label = new Label($order, $translation);
        assertEquals($order, $label->order);
        assertEquals($translation, $label->value);
    }
}
