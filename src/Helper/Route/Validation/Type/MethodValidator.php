<?php

namespace App\Helper\Route\Validation\Type;

use App\Helper\Route\Validation\AbstractType;
use App\Helper\Route\Validation\InterfaceValidation;

class MethodValidator extends AbstractType implements InterfaceValidation
{
   /**
    * @param mixed $value
    * @return bool
    */
   public function isValid(): bool
   { }
}
