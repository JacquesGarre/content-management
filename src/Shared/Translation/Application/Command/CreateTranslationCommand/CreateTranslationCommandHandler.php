<?php

declare(strict_types=1);

namespace App\Shared\Translation\Application\Command\CreateTranslationCommand;

use App\Shared\DomainEvent\Domain\DomainEventBusInterface;
use App\Shared\Translation\Domain\English;
use App\Shared\Translation\Domain\Exception\TranslationAlreadyExistsException;
use App\Shared\Translation\Domain\French;
use App\Shared\Translation\Domain\Id;
use App\Shared\Translation\Domain\Translation;
use App\Shared\Translation\Domain\TranslationRepositoryInterface;

final class CreateTranslationCommandHandler {

    public function __construct(
        public readonly DomainEventBusInterface $eventBus,
        public readonly TranslationRepositoryInterface $repository,
    ) {   
    }

    public function __invoke(CreateTranslationCommand $command): void
    {
        $id = Id::fromString($command->id);
        if ($this->repository->ofId($id)) {
            throw new TranslationAlreadyExistsException("Translation already exists with this id");
        }
        $english = $command->english ? new English($command->english) : null;
        $french = $command->french ? new French($command->french) : null;
        $translation = Translation::create(
            $id,
            $english,
            $french
        );
        $this->repository->add($translation);
        $this->eventBus->publish(...$translation->pullDomainEvents());
    }
}
