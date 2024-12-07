<?php 

declare(strict_types=1);

namespace App\Field\Domain\Input;

use App\Field\Domain\Input\Attribute\Name;
use App\Field\Domain\Order;
use App\Field\Domain\Validator\Validators;
use App\Form\Domain\FormElements\AbstractFormElement;
use App\Form\Domain\FormElements\FormElement;
use App\Shared\Style\Domain\CssClass;

abstract class AbstractInput extends AbstractFormElement {

    public function __construct(
        public readonly Order $order,
        public readonly Name $name,
        public readonly ?Value $value = null,
        public readonly ?Validators $validators = null,
        public readonly ?CssClass $class = null,
    ) {
        
    }

    public function validateValue(): void
    {
        if (!$this->validators) {
            return;
        }
        foreach($this->validators->value as $validator) {
            $validator->validate($this->value);
        }
    }
}