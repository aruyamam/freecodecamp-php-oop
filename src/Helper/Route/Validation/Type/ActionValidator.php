<?php

namespace App\Helper\Route\Validation\Type;

use App\Helper\Route\Validation\AbstractType;
use App\Helper\Route\Validation\InterfaceValidation;
use ReflectionException;
use ReflectionMethod;

class ActionValidator extends AbstractType implements InterfaceValidation
{
   /**
    * @return boolean
    */
   public function isValid(): bool
   {
      $className = $this->route->getController();
      $actionName = $this->route->getAction();

      $isValid = false;
      if (false === empty($actionName) && false === empty($className)) {
         $isValid = $this->doesExist($className, $actionName);
      }

      return $isValid;
   }

   /**
    * @param string $className
    * @param string $actionName
    *
    * @return boolean
    */
   public function doesExist(string $className, string $actionName): bool
   {
      $isValid = true;
      try {
         new ReflectionMethod($className, $actionName);
      } catch (ReflectionException $exception) {
         $isValid = false;
      }
      return $isValid;
   }
}
