<?php

declare(strict_types=1);

namespace App\Shared\DomainEvent\Infrastructure;

use App\Shared\DomainEvent\Domain\DomainEventBusInterface;
use App\Shared\DomainEvent\Domain\DomainEventInterface;
use Symfony\Component\Messenger\MessageBusInterface;

final class DomainEventBus implements DomainEventBusInterface {

    public function __construct(public readonly MessageBusInterface $messageBus)
    {
    }

    public function publish(DomainEventInterface ...$events): void
    {
        foreach($events as $event) {
            $this->messageBus->dispatch($event);
        }
    }
}