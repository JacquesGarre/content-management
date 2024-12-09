<?php

declare(strict_types=1);

namespace App\Translation\Application\Command\UpdateTranslationCommand;

use App\Shared\DomainEvent\Domain\DomainEventBusInterface;
use App\Translation\Domain\English;
use App\Translation\Domain\Exception\TranslationNotFoundException;
use App\Translation\Domain\French;
use App\Translation\Domain\Id;
use App\Translation\Domain\TranslationRepositoryInterface;

final class UpdateTranslationCommandHandler {

    public function __construct(
        public readonly DomainEventBusInterface $eventBus,
        public readonly TranslationRepositoryInterface $repository,
    ) {   
    }

    public function __invoke(UpdateTranslationCommand $command): void
    {
        $id = Id::fromString($command->id);
        $translation = $this->repository->ofId($id);
        if (!$translation) {
            throw new TranslationNotFoundException("Translation not found");
        }
        $english = $command->english ? new English($command->english) : null;
        $french = $command->french ? new French($command->french) : null;
        $translation = $translation->update(
            $english,
            $french
        );
        $this->repository->update($translation);
        $this->eventBus->publish(...$translation->pullDomainEvents());
    }
}
