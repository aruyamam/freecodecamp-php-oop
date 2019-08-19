<?php

namespace App\Helper\Route\Validation\Type;

use App\Helper\Route\Validation\AbstractType;
use App\Helper\Route\Validation\InterfaceValidation;
use ReflectionClass;
use ReflectionException;

class ControllerValidator extends AbstractType implements InterfaceValidation
{
   /**
    * @return boolean
    */
   public function isValid(): bool
   {
      $isValid = false;
      $className = $this->route->getController();

      if (false === empty($className)) {
         $isValid = $this->doesExist($className);
      }

      return $isValid;
   }

   /**
    * @param string $string
    *
    * @return boolean
    */
   public function doesExist(string $string): bool
   {
      $isValid = true;
      try {
         new ReflectionClass($string);
      } catch (ReflectionException $exception) {
         $isValid = false;
      }
      return $isValid;
   }
}
