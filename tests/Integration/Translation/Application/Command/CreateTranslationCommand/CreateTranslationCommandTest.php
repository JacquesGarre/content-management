<?php

declare(strict_types=1);

namespace App\Tests\Unit\Translation\Application\Command\CreateTranslationCommand;

use App\Shared\Command\Domain\CommandBusInterface;
use App\Shared\Command\Infrastructure\CommandBus;
use App\Translation\Application\Command\CreateTranslationCommand\CreateTranslationCommand;
use App\Translation\Domain\Exception\TranslationAlreadyExistsException;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Messenger\Exception\ValidationFailedException;

final class CreateTranslationCommandTest extends KernelTestCase {

    private CommandBus $commandBus;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $this->commandBus = $container->get(CommandBusInterface::class);
    }

    public function testInvalidNullIdCommand(): void
    {
        $faker = Factory::create();
        $command = new CreateTranslationCommand(
            english: $faker->word()
        );
        $this->expectException(ValidationFailedException::class);
        $this->commandBus->dispatch($command);
    }

    public function testInvalidIdCommand(): void
    {
        $faker = Factory::create();
        $command = new CreateTranslationCommand(
            id: $faker->word(),
            english: $faker->word()
        );
        $this->expectException(ValidationFailedException::class);
        $this->commandBus->dispatch($command);
    }

    public function testInvalidNullEnglishCommand(): void
    {
        $faker = Factory::create();
        $command = new CreateTranslationCommand(
            id: $faker->uuid()
        );
        $this->expectException(ValidationFailedException::class);
        $this->commandBus->dispatch($command);
    }
}