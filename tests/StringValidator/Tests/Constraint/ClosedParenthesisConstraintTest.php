<?php

namespace manugarciaes\tests\StringValidator\Tests\Constraint;
use stringValidator\Constraint\ClosedParenthesisConstraint;

/**
 * Class ClosedParenthesisConstraintTest
 * @package manugarciaes\tests\StringValidator\Tests
 */
class ClosedParenthesisConstraintTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validateProvider
     */
    public function testValidateString($string, $expected)
    {
        $constraint = new ClosedParenthesisConstraint();
        $this->assertEquals($expected, $constraint->validate($string));
    }

    public function validateProvider()
    {
        return [
            ['hola (amigo)', true],
            ['como estas (tu y tu familia (y el perro))', true],
            ['como estas (tu y tu familia (y el perro)', false],
            ['como estas (tu y tu familia y el perro))', false],
            ['como estas (tu y tu familia (((y el perro))', false],
            ['como estas (tu y tu familia ()()((())((((y el perro))', false],
        ];
    }
}