<?php namespace Route;

use Helper\Route\Router;

class RouterTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * @group router
     * @group router-routes-array
     */
    public function testIsRoutesArray()
    {
        $router = new Router();
        $this->assertIsArray($router->getRoutes());
    }
}