<?php

declare(strict_types=1);

namespace App\Field\Domain\Validator\Exception;

use App\Field\Domain\Validator\ValidationError;
use Exception;

abstract class ValueValidationException extends Exception {

    public function __construct(public readonly ValidationError $error)
    {   
        $message = json_encode($error->toArray());
        parent::__construct($message);
    }
}