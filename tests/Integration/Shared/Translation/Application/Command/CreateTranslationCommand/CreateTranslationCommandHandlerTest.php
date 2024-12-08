<?php

declare(strict_types=1);

namespace App\Tests\Integration\Shared\Translation\Application\Command\CreateTranslationCommand;

use App\Shared\Translation\Application\Command\CreateTranslationCommand\CreateTranslationCommand;
use App\Shared\Translation\Application\Command\CreateTranslationCommand\CreateTranslationCommandHandler;
use App\Shared\Translation\Domain\Exception\TranslationAlreadyExistsException;
use App\Shared\Translation\Domain\Id;
use App\Shared\Translation\Domain\TranslationRepositoryInterface;
use App\Shared\Translation\Infrastructure\Persistence\DoctrineTranslationRepository;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotNull;

final class CreateTranslationCommandHandlerTest extends KernelTestCase {

    private DoctrineTranslationRepository $repository;
    private CreateTranslationCommandHandler $handler;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $this->repository = $container->get(TranslationRepositoryInterface::class);
        $this->handler = $container->get(CreateTranslationCommandHandler::class);
    }

    public function testSunnyCase(): void
    {
        $faker = Factory::create();
        $command = new CreateTranslationCommand(
            $faker->uuid(),
            $faker->word(),
            $faker->word()
        );
        ($this->handler)($command);
        $id = Id::fromString($command->id);
        $translation = $this->repository->ofId($id);
        assertNotNull($translation);
        assertEquals($command->id, $translation->id->value->toString());
        assertEquals($command->english, $translation->english->value);
        assertEquals($command->french, $translation->french->value);
    }

    public function testTranslationAlreadyExistsException(): void
    {
        $faker = Factory::create();
        $command = new CreateTranslationCommand(
            $faker->uuid(),
            $faker->word(),
            $faker->word()
        );
        ($this->handler)($command);

        $this->expectException(TranslationAlreadyExistsException::class);
        ($this->handler)($command);
    }
}