<?php

namespace Helper\Route;

use App\Controller\Type\Home;
use App\Helper\Route\Router;
use App\Helper\Route\Route;

class RouterTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    { }

    protected function _after()
    { }

    /**
     * @group router
     * @group router-defaults
     */
    public function testDefaults()
    {
        $router = new Router();
        $this->assertIsArray($router->getRoutes());
        $this->assertEquals(0, count($router->getRoutes()));
    }

    /**
     * @group router
     * @group router-routes-array
     */
    public function testRoutesAnArray()
    {
        $router = new Router();
        $this->assertIsArray($router->getRoutes());
    }

    /**
     * @group router
     * @group router-add-route
     */
    public function testAddRoute()
    {
        $route = new Route();
        $route->setController(Home::class)
            ->setMethod(['GET'])
            ->setPattern('/')
            ->setAction('index');

        $router = new Router();
        $router::add($route);

        $this->assertIsArray($router->getRoutes());
        $this->assertEquals(1, count($router->getRoutes()));
    }

    /**
     * @group router
     * @group router-add-duplicate
     */
    public function testAddDuplicateRoute()
    {
        $route = new Route();
        $route->setController(Home::class)
            ->setMethod(['GET'])
            ->setPattern('/')
            ->setAction('index');

        $router = new Router();
        $router::add($route);
        $router::add($route);

        $this->assertIsArray($router->getRoutes());
        $this->assertEquals(1, count($router->getRoutes()));
    }
}
