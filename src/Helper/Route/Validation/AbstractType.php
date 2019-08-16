<?php

namespace App\Helper\Route\Validation;

use App\Helper\Route\Route;

abstract class AbstractType
{
   protected $route;

   /**
    * @param Route $route
    *
    * @return mixed
    */
   public function setRoute(Route $route)
   {
      $this->route = $route;
   }
}
