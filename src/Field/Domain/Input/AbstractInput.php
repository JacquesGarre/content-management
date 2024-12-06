<?php 

declare(strict_types=1);

namespace App\Field\Domain\Input;

use App\Field\Domain\Input\Attribute\Name;
use App\Field\Domain\Validator\Validators;

abstract class AbstractInput {

    public function __construct(
        public readonly Name $name,
        public readonly ?Value $value = null,
        public readonly ?Validators $validators = null,
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