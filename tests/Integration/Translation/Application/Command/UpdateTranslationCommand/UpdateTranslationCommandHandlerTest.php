<?php

declare(strict_types=1);

namespace App\Tests\Integration\Translation\Application\Command\UpdateTranslationCommand;

use App\Shared\Command\Domain\CommandBusInterface;
use App\Shared\Command\Infrastructure\CommandBus;
use App\Tests\Stubs\Translation\Domain\TranslationStub;
use App\Translation\Application\Command\UpdateTranslationCommand\UpdateTranslationCommand;
use App\Translation\Domain\Exception\TranslationAlreadyExistsException;
use App\Translation\Domain\Exception\TranslationNotFoundException;
use App\Translation\Domain\Id;
use App\Translation\Domain\TranslationRepositoryInterface;
use App\Translation\Infrastructure\Persistence\DoctrineTranslationRepository;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotNull;

final class UpdateTranslationCommandHandlerTest extends KernelTestCase {

    private DoctrineTranslationRepository $repository;
    private CommandBus $commandBus;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $this->repository = $container->get(TranslationRepositoryInterface::class);
        $this->commandBus = $container->get(CommandBusInterface::class);
    }

    public function testSunnyCase(): void
    {
        $translation = TranslationStub::random();
        $this->repository->add($translation);

        $faker = Factory::create();
        $command = new UpdateTranslationCommand(
            $translation->id->value->toString(),
            $faker->word(),
            $faker->word()
        );
        $this->commandBus->dispatch($command);
        $translation = $this->repository->ofId($translation->id);
        assertNotNull($translation);
        assertEquals($command->id, $translation->id->value->toString());
        assertEquals($command->english, $translation->english->value);
        assertEquals($command->french, $translation->french->value);
    }

    public function testTranslationNotFoundException(): void
    {
        $faker = Factory::create();
        $command = new UpdateTranslationCommand(
            $faker->uuid(),
            $faker->word(),
            $faker->word()
        );
        $this->expectException(TranslationNotFoundException::class);
        $this->commandBus->dispatch($command);
    }
}