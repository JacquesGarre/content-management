<?php

declare(strict_types=1);

namespace App\Tests\Unit\Field\Domain;

use App\Field\Domain\Label;
use App\Tests\Stubs\Shared\Translation\Domain\TranslationStub;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class LabelTest extends TestCase {

    public function testFromTranslation(): void
    {   
        $translation = TranslationStub::random();
        $label = Label::fromTranslation($translation);
        assertEquals($translation, $label->value);
    }
}
