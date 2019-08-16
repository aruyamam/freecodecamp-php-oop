<?php

namespace App\Helper\Route\Validation;

use App\Helper\Route\Route;

interface InterfaceValidation
{
   /**
    * @return boolean
    */
   public function isValid(): bool;

   /**
    * @param Route $route
    *
    * @return mixed
    */
   public function setRoute(Route $route);
}
