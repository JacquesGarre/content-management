<?php 

declare(strict_types=1);

namespace App\Field\Domain\Validator;

use App\Field\Domain\Input\Value;

abstract class AbstractValidator {

    public function __construct(public readonly ValidationError $error)
    {
    }

    abstract public function validate(?Value $value = null): void;
}