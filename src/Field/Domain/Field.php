<?php

declare(strict_types=1);

namespace App\Field\Domain;

use App\Field\Domain\Input\AbstractInput;
use App\Form\Domain\FormElements\AbstractFormElement;
use App\Form\Domain\FormElements\FormElement;
use App\Shared\Style\Domain\CssClass;

final class Field extends AbstractFormElement {

    public function __construct(
        public readonly Id $id,
        public readonly Order $order,
        public readonly AbstractInput $input,
        public readonly ?Label $label = null,
        public readonly ?CssClass $class = null,
    ) {
        
    }

    public function validate(): void
    {
        $this->input->validateValue();
    }
}
