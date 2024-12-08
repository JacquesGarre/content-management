<?php

declare(strict_types=1);

namespace App\Tests\Stubs\Translation\Domain;

use App\Translation\Domain\Translation;

final class TranslationStub {

    public static function random(): Translation 
    {
        return new Translation(
            IdStub::random(),
            EnglishStub::random(),
            FrenchStub::random(),
        );
    }
}