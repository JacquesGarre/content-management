<?php

declare(strict_types=1);

namespace App\Translation\Domain;

use App\Shared\DomainEvent\Domain\AbstractDomainEvent;
use Ramsey\Uuid\UuidInterface;

final class TranslationUpdatedDomainEvent extends AbstractDomainEvent {

    public const EVENT_NAME = 'TranslationUpdatedDomainEvent';

    public function __construct(
        UuidInterface $aggregateId,
        public readonly Translation $translation
    )
    {
        parent::__construct($aggregateId);
    }

    public function eventName(): string
    {
        return self::EVENT_NAME;
    }

    public static function fromTranslation(Translation $translation): self
    {
        return new self($translation->id->value, $translation);
    }
}