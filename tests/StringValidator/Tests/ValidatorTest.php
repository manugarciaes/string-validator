<?php

namespace manugarciaes\tests\StringValidator\Tests;

use stringValidator\Constraint\ConstraintInterface;
use stringValidator\Exception\ValidatorException;
use stringValidator\Validator;

/**
 * Class ValidatorTest
 * @package manugarciaes\tests\StringValidator\Tests
 */
class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Validate a empty string without constraint
     */
    public function testValidatorValidateOk()
    {
        $validator = new Validator();

        $this->assertTrue($validator->isValid(''));
    }

    public function testValidatorWithConstraintOK()
    {
        $validator = new Validator();

        $mockConstraint = $this->getMock(ConstraintInterface::class);
        $mockConstraint->method('validate')->willReturn(true);

        $validator->addConstraint($mockConstraint);

        $this->assertTrue($validator->isValid(''));
    }

    /**
     * @throws ValidatorException
     */
    public function testValidatorWithConstraintKO()
    {
        $this->setExpectedException(ValidatorException::class);
        $validator = new Validator();
        $mockConstraint = $this->getMock(ConstraintInterface::class);
        $mockConstraint->method('validate')->willReturn(false);

        $validator->addConstraint($mockConstraint);
        $validator->isValid('');
    }
}
