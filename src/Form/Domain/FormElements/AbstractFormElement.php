<?php

declare(strict_types=1);

namespace App\Form\Domain\FormElements;

use App\Shared\Style\Domain\CssClass;

abstract class AbstractFormElement {

    public readonly Id $id;
    public readonly Order $order;
    public readonly ?CssClass $cssClass;
    
}