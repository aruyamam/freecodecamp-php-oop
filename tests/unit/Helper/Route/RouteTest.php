<?php

namespace Helper\Route;

use App\Controller\Type\Home;
use App\Helper\Route\Route;

class RouteTest extends \Codeception\Test\Unit
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
     * @group route
     * @group route-default
     */
    public function testDefault()
    {
        $route = new Route();

        $this->assertSame('', $route->getController());
        $this->assertSame('', $route->getAction());
        $this->assertSame('', $route->getPattern());
        $this->assertSame([], $route->getMethod());
    }

    /**
     * @group route
     * @group route-home-page
     */
    public function testHomePageIndex()
    {
        $route = new Route();
        $route->setController(Home::class)
            ->setMethod(['GET'])
            ->setPattern('/')
            ->setAction('index');

        $this->assertSame(Home::class, $route->getController());
        $this->assertSame(['GET'], $route->getMethod());
        $this->assertSame('/', $route->getPattern());
        $this->assertSame('index', $route->getAction());
    }
}
