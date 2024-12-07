<?php

declare(strict_types=1);

namespace App\Form\Domain;

final class Form {

    public function __construct(
        public readonly Id $id,
        public readonly Title $title,
        public readonly Action $action,
        public readonly FormElements $formElements,
        public readonly SubmitButtonLabel $submitBtnLabel,
    ) {
    }


}
