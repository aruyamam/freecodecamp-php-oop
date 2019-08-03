<?php

namespace Helper\Route;

class Processor
{
   /**
    * @param Router $router
    * @param string $currentURI
    *
    * @return mixed
    *
    * @throws Exception
    */
   public function process(Router $router, string $currentURI)
   {
      $knownRoute = $router->process($currentURI);

      $controllerName = $knownRoute->getController();
      $controller = new $controllerName();

      return $controller->{$knownRoute->getMethod()}();
   }

   /**
    * @param $routes
    * @return Router
    *
    * @throws Exception
    */
   public function make($routes): Router
   {
      $router = new Router($routes);

      foreach ($routes as $routeData) {
         $route = new Route($routeData);
         $router->register($route);
      }
      return $router;
   }
}
