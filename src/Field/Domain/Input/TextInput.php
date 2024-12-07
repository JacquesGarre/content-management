<?php

declare(strict_types=1);

namespace App\Field\Domain\Input;

use App\Field\Domain\Input\AbstractInput;
use App\Field\Domain\Input\Attribute\Name;
use App\Field\Domain\Input\Attribute\Placeholder;
use App\Field\Domain\Validator\Validators;

final class TextInput extends AbstractInput {

    public function __construct(
        public readonly Name $name,
        public readonly ?Value $value = null,
        public readonly ?Validators $validators = null,
        public readonly ?Placeholder $placeholder = null,
    ) {
        
    }

}