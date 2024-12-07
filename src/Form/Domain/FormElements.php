<?php

declare(strict_types=1);

namespace App\Form\Domain;

final class FormElements {

    public function __construct(
        public readonly array $value
    ) { 
    }

}