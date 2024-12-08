<?php

declare(strict_types=1);

namespace App\Tests\Integration\Translation\Infrastructure\Persistence;

use App\Translation\Domain\TranslationRepositoryInterface;
use App\Translation\Infrastructure\Persistence\DoctrineTranslationRepository;
use App\Tests\Stubs\Translation\Domain\TranslationStub;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class DoctrineTranslationRepositoryTest extends KernelTestCase
{
    private DoctrineTranslationRepository $repository;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $this->repository = $container->get(TranslationRepositoryInterface::class);
    }

    public function testAddAndRetrieveTranslation(): void
    {
        $translation = TranslationStub::random();
        $this->repository->add($translation);

        $retrievedTranslation = $this->repository->ofId($translation->id);
        $this->assertNotNull($retrievedTranslation);
        $this->assertEquals($translation->english->value, $retrievedTranslation->english->value);
        $this->assertEquals($translation->french->value, $retrievedTranslation->french->value);
        $this->repository->remove($translation);
    }

    public function testRemoveTranslation(): void
    {
        $translation = TranslationStub::random();
        $this->repository->add($translation);

        $this->repository->remove($translation);
        $retrievedTranslation = $this->repository->ofId($translation->id);
        $this->assertNull($retrievedTranslation);
    }
}