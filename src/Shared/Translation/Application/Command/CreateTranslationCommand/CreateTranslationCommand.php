<?php

declare(strict_types=1);

namespace App\Shared\Translation\Application\Command\CreateTranslationCommand;

final class CreateTranslationCommand {

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $english = null,
        public readonly ?string $french = null,
    ) {   
    }
}
