<?php

declare(strict_types=1);

namespace App\Field\Domain;

use App\Shared\Style\Domain\CssClass;
use App\Shared\Translation\Domain\Translation;

final class Label {

    public function __construct(
        public readonly Translation $value,
        public readonly ?CssClass $class = null,
    ) {
    }
}
