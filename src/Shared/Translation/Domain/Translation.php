<?php

declare(strict_types=1);

namespace App\Shared\Translation\Domain;

final class Translation {

    public function __construct(
        public readonly Id $id,
        public readonly English $english,
        public readonly French $french,
    ) {   
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value->toString(),
            'en' => $this->english->value,
            'fr' => $this->french->value,
        ];
    }
}