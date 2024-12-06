<?php

declare(strict_types=1);

namespace App\Field\Domain;

use App\Field\Domain\Input\AbstractInput;

final class Field {

    public function __construct(
        public readonly Id $id,
        public readonly Order $order,
        public readonly AbstractInput $input,
        public readonly ?Label $label = null,
    ) {
        
    }

    public function validate(): void
    {
        $this->input->validateValue();
    }
}
