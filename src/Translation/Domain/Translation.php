<?php

declare(strict_types=1);

namespace App\Translation\Domain;

use App\Shared\AggregateRoot;

final class Translation extends AggregateRoot {

    public function __construct(
        public readonly Id $id,
        public readonly English $english,
        public readonly ?French $french,
    ) {   
    }

    public static function create(
        Id $id,
        English $english = null,
        ?French $french = null,
    ): self {
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