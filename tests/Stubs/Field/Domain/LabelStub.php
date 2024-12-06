<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Field\Domain;

use App\Field\Domain\Label;
use App\Tests\Stubs\Shared\Translation\Domain\TranslationStub;
use Faker\Factory;

final class LabelStub {

    public static function random(): Label
    {
        $translation = TranslationStub::random();
        return Label::fromTranslation($translation);
    }
}