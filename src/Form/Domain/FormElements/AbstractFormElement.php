<?php

declare(strict_types=1);

namespace App\Form\Domain\FormElements;

use App\Form\Domain\Id as FormId;
use App\Shared\Style\Domain\CssClass;

abstract class AbstractFormElement {

    public function __construct(
        public readonly Id $id,
        public readonly FormId $formId,
        public readonly Order $order,
        public readonly ?CssClass $cssClass = null
    ) {
    }
    
}