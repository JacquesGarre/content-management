<?php

declare(strict_types=1);

namespace App\Tests\Unit\Translation\Domain;

use App\Translation\Domain\Translation;
use App\Translation\Domain\TranslationCreatedDomainEvent;
use App\Tests\Stubs\Translation\Domain\EnglishStub;
use App\Tests\Stubs\Translation\Domain\FrenchStub;
use App\Tests\Stubs\Translation\Domain\IdStub;
use App\Tests\Stubs\Translation\Domain\TranslationStub;
use App\Translation\Domain\TranslationUpdatedDomainEvent;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

final class TranslationTest extends TestCase {

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

    public function testUpdate(): void 
    {
        $translation = TranslationStub::random();
        $french = FrenchStub::random();
        $english = EnglishStub::random();
        $translation = $translation->update($english, $french);
        assertEquals($french->value, $translation->french->value);
        assertEquals($english->value, $translation->english->value);
        $event = $translation->pullDomainEvents()[0];
        assertInstanceOf(TranslationUpdatedDomainEvent::class, $event);
    }
}