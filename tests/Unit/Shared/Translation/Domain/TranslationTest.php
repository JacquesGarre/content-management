<?php

declare(strict_types=1);

namespace App\Tests\Unit\Shared\Translation\Domain;

use App\Shared\Translation\Domain\Translation;
use App\Tests\Stubs\Shared\Translation\Domain\EnglishStub;
use App\Tests\Stubs\Shared\Translation\Domain\FrenchStub;
use App\Tests\Stubs\Shared\Translation\Domain\IdStub;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class TranslationTest extends TestCase {

    public function testTranslation(): void
    {
        $id = IdStub::random();
        $french = FrenchStub::random();
        $english = EnglishStub::random();
        $translation = new Translation($id, $english, $french);
        assertEquals($id, $translation->id);
        assertEquals($french, $translation->french);
        assertEquals($english, $translation->english);
    }

    public function testTranslationToArray(): void
    {
        $id = IdStub::random();
        $french = FrenchStub::random();
        $english = EnglishStub::random();
        $translation = new Translation($id, $english, $french);
        assertEquals($id, $translation->id);
        assertEquals($french, $translation->french);
        assertEquals($english, $translation->english);
        $expected = [
            'id' => $id->value->toString(),
            'en' => $english->value,
            'fr' => $french->value
        ];
        $array = $translation->toArray();
        assertEquals($expected, $array);
    }
}