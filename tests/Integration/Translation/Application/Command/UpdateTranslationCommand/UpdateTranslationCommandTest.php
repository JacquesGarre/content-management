<?php

declare(strict_types=1);

namespace App\Tests\Unit\Translation\Application\Command\UpdateTranslationCommand;

use App\Shared\Command\Domain\CommandBusInterface;
use App\Shared\Command\Infrastructure\CommandBus;
use App\Translation\Application\Command\UpdateTranslationCommand\UpdateTranslationCommand;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Messenger\Exception\ValidationFailedException;

final class UpdateTranslationCommandTest extends KernelTestCase {

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
        $command = new UpdateTranslationCommand(
            english: $faker->word()
        );
        $this->expectException(ValidationFailedException::class);
        $this->commandBus->dispatch($command);
    }

    public function testInvalidIdCommand(): void
    {
        $faker = Factory::create();
        $command = new UpdateTranslationCommand(
            id: $faker->word(),
            english: $faker->word()
        );
        $this->expectException(ValidationFailedException::class);
        $this->commandBus->dispatch($command);
    }
}