<?php

declare(strict_types=1);

namespace App\Field\Domain;

use App\Form\Domain\FormElements\AbstractFormElement;
use App\Form\Domain\FormElements\FormElement;
use App\Shared\Style\Domain\CssClass;
use App\Shared\Translation\Domain\Translation;

final class Label extends AbstractFormElement {

    public function __construct(
        public readonly Order $order,
        public readonly Translation $value,
        public readonly ?CssClass $class = null,
    ) {
    }
}
