<?php
/*
 * This file is part of the String Validator package.
 *
 * Copyright (c) 2015-2017
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Manu Garcia <manugarciaes@gmail.com>
 */
namespace stringValidator;

use stringValidator\Constraint\ConstraintInterface;
use stringValidator\Exception\ValidatorException;

/**
 * Class Validator
 * @package stringValidator
 */
class Validator implements ValidatorInterface
{
    /**
     * @var array
     */
    private $constraints;

    /**
     * Validator constructor.
     */
    public function __construct()
    {
        $this->constraints = [];
    }

    /**
     * @param string $string
     * @return bool
     * @throws ValidatorException
     */
    public function isValid($string)
    {
        /**
         * @var $constraint ConstraintInterface
         */
        foreach ($this->constraints as $constraint) {
            if ($constraint->validate($string) !== true) {
                throw new ValidatorException(
                    $constraint->getMessage()
                );
            }
        }

        return true;
    }

    /**
     * @param ConstraintInterface $constraint
     * @return $this
     */
    public function addConstraint(ConstraintInterface $constraint)
    {
        $this->constraints[] = $constraint;

        return $this;
    }
}
