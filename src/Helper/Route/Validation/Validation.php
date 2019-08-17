<?php

namespace App\Helper\Route\Validation;

use App\Helper\Route\Route;

class Validation
{
   /**
    * @var array
    */
   private $validators = [];

   /**
    * @param array $validators
    */
   public function setValidators(array $validators)
   {
      foreach ($validators as $validator) {
         $this->validators[get_class($validator)] = $validator;
      }
   }

   /**
    * @param InterfaceValidation $interfaceValidation
    */
   public function addVaidator(InterfaceValidation $interfaceValidation)
   {
      $this->setValidators([$interfaceValidation]);
   }

   /**
    * @param string $className
    *
    * @return boolean
    */
   public function hasValidator($className): bool
   {
      return key_exists($className, $this->validators);
   }

   /**
    * @param Route $route
    */
   public function validate(Route $route)
   {
      foreach ($this->validators as $validator) {
         if ($validator instanceof InterfaceValidation) {
            $validator->setRoute($route);
            $validator->isValid();
         }
      }
   }
}
