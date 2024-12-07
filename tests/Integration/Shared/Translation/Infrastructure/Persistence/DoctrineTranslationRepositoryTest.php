<?php

declare(strict_types=1);

namespace App\Tests\Integration\Shared\Translation\Infrastructure\Persistence;

use App\Shared\Translation\Domain\Translation;
use App\Shared\Translation\Infrastructure\Persistence\DoctrineTranslationRepository;
use App\Tests\Stubs\Shared\Translation\Domain\TranslationStub;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class DoctrineTranslationRepositoryTest extends KernelTestCase
{
    private EntityManagerInterface $em;
    private DoctrineTranslationRepository $repository;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->em = self::getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = new DoctrineTranslationRepository($this->em);
        $this->clearDatabase();
    }

    private function clearDatabase(): void
    {
        $connection = $this->em->getConnection();
        $schemaManager = $connection->createSchemaManager();
        foreach ($schemaManager->listTableNames() as $tableName) {
            $connection->executeQuery("DELETE FROM $tableName");
        }
    }

    public function testAddAndRetrieveTranslation(): void
    {
        $translation = TranslationStub::random();
        $this->repository->add($translation);

        $retrievedTranslation = $this->repository->ofId($translation->id);
        $this->assertNotNull($retrievedTranslation);
        $this->assertEquals($translation->english->value, $retrievedTranslation->english->value);
        $this->assertEquals($translation->french->value, $retrievedTranslation->french->value);
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