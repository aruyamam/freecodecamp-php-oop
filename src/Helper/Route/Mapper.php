<?php

namespace App\Helper\Route;

use Exception;

class Mapper
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
    * @param Router $router
    * @param string $currentURI
    *
    * @return void
    *
    * @throws Exception
    */
   public function run(Router $router, string $currentURI)
   {
      // 1) Get path from $currentURI
      $parseURL = parse_url($currentURI);

      $path = $parseURL['path'];
      // 2) Get array of routes

      foreach ($router->getRoutes() as $pattern => $route) {
         // 3) Check instance of Route
         if (FALSE === $route instanceof Route) {
            // 4) Throw exception
            throw new Exception('This is not a route');
         }
         // 5) Handle pattern
         if (preg_match('#^' . $pattern . '$#', $path, $matches)) {
            // 6) Construct controller
            $controllerName = $route->getController();
            $controller = new $controllerName();

            break;
         }
      }
      // 7) Get method
      // 8) Returning method
      return $controller->{$route->getMethod()}();
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
