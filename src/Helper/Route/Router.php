<?php

namespace App\Helper\Route;

class Router
{
   /**
    * @var array
    */
   private static $routes = [];

   public static function add(Route $route)
   {
      self::$routes[$route->getPattern()] = $route;
   }

   /**
    * @return array
    */
   public function getRoutes(): array
   {
      return self::$routes;
   }
}
