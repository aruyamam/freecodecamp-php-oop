<?php

namespace App\Helper\Route;

class Route
{
   /**
    * @var string
    */
   private $pattern = '';
   /**
    * @var string
    */
   private $controller = '';
   /**
    * @var string
    */
   private $action = '';
   /**
    * @var array
    */
   private $method = [];

   /**
    * @return  string
    */
   public function getPattern(): string
   {
      return $this->pattern;
   }

   /**
    * @param  string  $pattern
    * @return  Route
    */
   public function setPattern(string $pattern): Route
   {
      $this->pattern = $pattern;

      return $this;
   }

   /**
    * @return  string
    */
   public function getController(): string
   {
      return $this->controller;
   }

   /**
    * @param  string  $controller
    *
    * @return  Route
    */
   public function setController(string $controller): Route
   {
      $this->controller = $controller;

      return $this;
   }

   /**
    * @return  array
    */
   public function getMethod(): array
   {
      return $this->method;
   }

   /**
    * @param  array  $method
    * @return  Route
    */
   public function setMethod(array $method): Route
   {
      $this->method = $method;

      return $this;
   }

   /**
    * @return  string
    */
   public function getAction(): string
   {
      return $this->action;
   }

   /**
    * @param  string  $action
    * @return  Route
    */
   public function setAction(string $action): Route
   {
      $this->action = $action;

      return $this;
   }
}
