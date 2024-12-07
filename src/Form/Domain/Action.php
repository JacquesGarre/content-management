<?php

declare(strict_types=1);

namespace App\Form\Domain;

enum Action: string {
    case Add = 'add';
    case Edit = 'edit';
}