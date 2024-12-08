<?php

declare(strict_types=1);

namespace App\Shared\Translation\Application\Command\CreateTranslationCommand;

use App\Shared\Command\Domain\AbstractCommand;

final class CreateTranslationCommand extends AbstractCommand {

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $english = null,
        public readonly ?string $french = null,
    ) {   
    }
}
