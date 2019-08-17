<?php

namespace App\Helper\Route\Validation\Type;

use App\Helper\Route\Validation\AbstractType;
use App\Helper\Route\Validation\InterfaceValidation;

class ActionValidation extends AbstractType implements InterfaceValidation
{
   /**
    * @return boolean
    */
   public function isValid(): bool
   { }
}
