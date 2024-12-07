<?php

declare(strict_types=1);

namespace App\Form\Domain\FormElements;

use App\Form\Domain\FormElements;
use App\Form\Domain\FormElements\Order;
use App\Form\Domain\Id as FormId;
use App\Shared\Style\Domain\CssClass;

final class Column extends AbstractFormElement {

    public function __construct(
        Id $id,
        FormId $formId,
        Order $order,
        public readonly FormElements $formElements,
        ?CssClass $cssClass = null,
    ) {
        parent::__construct($id, $formId, $order, $cssClass);
    }
}