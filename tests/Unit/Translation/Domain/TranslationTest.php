<?php

declare(strict_types=1);

namespace App\Tests\Unit\Translation\Domain;

use App\Translation\Domain\Translation;
use App\Translation\Domain\TranslationCreatedDomainEvent;
use App\Tests\Stubs\Translation\Domain\EnglishStub;
use App\Tests\Stubs\Translation\Domain\FrenchStub;
use App\Tests\Stubs\Translation\Domain\IdStub;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

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

    public function testCreate(): void
    {
        $id = IdStub::random();
        $french = FrenchStub::random();
        $english = EnglishStub::random();
        $translation = Translation::create($id, $english, $french);
        assertEquals($id, $translation->id);
        assertEquals($french, $translation->french);
        assertEquals($english, $translation->english);
        $event = $translation->pullDomainEvents()[0];
        assertInstanceOf(TranslationCreatedDomainEvent::class, $event);
    }
}