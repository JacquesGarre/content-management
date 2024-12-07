<?php

declare(strict_types=1);

namespace App\Form\Domain\FormElements;

use App\Field\Domain\Order;
use App\Form\Domain\FormElements;
use App\Shared\Style\Domain\CssClass;

final class Column extends AbstractFormElement {

    public function __construct(
        public readonly Order $order,
        public readonly ?CssClass $class = null,
        public readonly FormElements $formElements,
    ) {
    }
}
