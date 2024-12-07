<?php

declare(strict_types=1);

namespace App\Form\Domain\FormElements;

use App\Form\Domain\FormElements;
use App\Form\Domain\FormElements\Order;
use App\Shared\Style\Domain\CssClass;

final class Row extends AbstractFormElement {

    public function __construct(
        public readonly Id $id,
        public readonly Order $order,
        public readonly ?CssClass $class = null,
        public readonly FormElements $formElements,
    ) {
    }
}
