<?php

declare(strict_types=1);

namespace App\Shared\Translation\Domain;

use App\Shared\AggregateRoot;
use App\Shared\Translation\Domain\Exception\EmptyTranslationException;

final class Translation extends AggregateRoot {

    public function __construct(
        public readonly Id $id,
        public readonly ?English $english,
        public readonly ?French $french,
    ) {   
    }

    public static function create(
        Id $id,
        ?English $english = null,
        ?French $french = null,
    ): self {
        if (!$french && !$english) {
            throw new EmptyTranslationException("No translation was provided");
        }
        $translation = new self($id, $english, $french);
        $translation->notify(TranslationCreatedDomainEvent::fromTranslation($translation));
        return $translation;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value->toString(),
            'en' => $this->english?->value,
            'fr' => $this->french?->value,
        ];
    }
}