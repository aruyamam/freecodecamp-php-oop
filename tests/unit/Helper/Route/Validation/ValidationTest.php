<?php

namespace Helper\Route\Validation;

use App\Helper\Route\Validation\Type\ControllerValidator;
use App\Helper\Route\Validation\Type\MethodValidator;
use App\Helper\Route\Validation\Validation;

class ValidationTest extends \Codeception\Test\Unit
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
     * @group validation-add-one-validator
     */
    public function testValidatorAddOne()
    {
        $validator = new ControllerValidator();

        $validation = new Validation();
        $validation->addVaidator($validator);

        $this->assertTrue($validation->hasValidator(ControllerValidator::class));
    }

    /**
     * @group validation
     * @group validation-add-two-validator
     */
    public function testValidatorAddTwo()
    {
        $validator1 = new ControllerValidator();
        $validator2 = new MethodValidator();

        $validation = new Validation();
        $validation->addVaidator($validator1);
        $validation->addVaidator($validator2);

        $this->assertTrue($validation->hasValidator(ControllerValidator::class));
        $this->assertTrue($validation->hasValidator(MethodValidator::class));
    }
}
