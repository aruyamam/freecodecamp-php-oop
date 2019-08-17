<?php

namespace Helper\Route\Validation;

use App\Controller\Type\Home;
use App\Helper\Route\Route;
use App\Helper\Route\Validation\Type\ControllerValidator;
use App\Helper\Route\Validation\Type\MethodValidator;
use App\Helper\Route\Validation\Validation;

class MethodValidatorTest extends \Codeception\Test\Unit
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
     * @group validation
     * @group validation-type
     * @group validation-type-method
     * @group validation-type-method-is-upper-case
     */
    public function testIsUppercase()
    {
        $route = new Route();
        $route->setController(Home::class)
            ->setMethods(['GET']);

        $validator = new MethodValidator();
        $validator->setRoute($route);

        $this->assertTrue($validator->isValid());
    }

    /**
     * @group validation
     * @group validation-type
     * @group validation-type-method
     * @group validation-type-method-is-lowercase
     */
    public function testIsLowercase()
    {
        $route = new Route();
        $route->setController(Home::class)
            ->setMethods(['get']);

        $validator = new MethodValidator();
        $validator->setRoute($route);

        $this->assertTrue($validator->isValid());
    }

    /**
     * @group validation
     * @group validation-type
     * @group validation-type-method
     * @group validation-type-method-is-invalid
     */
    public function testIsInvalid()
    {
        $route = new Route();
        $route->setController(Home::class)
            ->setMethods(['this-should-not-work']);

        $validator = new MethodValidator();
        $validator->setRoute($route);

        $this->assertFalse($validator->isValid());
    }
}
