<?php

declare(strict_types=1);

namespace App\Field\Domain;

use App\Field\Domain\Input\AbstractInput;
use App\Form\Domain\FormElements\AbstractFormElement;
use App\Form\Domain\FormElements\Id;
use App\Form\Domain\FormElements\Order;
use App\Form\Domain\Id as FormId;
use App\Shared\Style\Domain\CssClass;

final class Field extends AbstractFormElement {

    public function __construct(
        Id $id,
        FormId $formId,
        Order $order,
        public readonly AbstractInput $input,
        public readonly ?Label $label = null,
        ?CssClass $cssClass = null
    ) {
        parent::__construct($id, $formId, $order, $cssClass);
    }

    public function validate(): void
    {
        $this->input->validateValue();
    }
}
