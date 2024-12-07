<?php

declare(strict_types=1);

namespace App\Form\Domain\FormElements;

use App\Field\Domain\Order;

abstract class AbstractFormElement {

    public readonly Order $order;
    
}