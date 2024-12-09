<?php

declare(strict_types=1);

namespace App\Translation\Application\Command\UpdateTranslationCommand;

use App\Shared\Command\Domain\AbstractCommand;

final class UpdateTranslationCommand extends AbstractCommand {

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $english = null,
        public readonly ?string $french = null,
    ) {   
    }
}
