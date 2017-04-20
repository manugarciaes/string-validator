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

/**
 * Interface ValidatorInterface
 * @package stringValidator
 */
interface ValidatorInterface
{
    /**
     * @param $string
     * @return bool
     */
    public function isValid($string);

    /**
     * @param ConstraintInterface $constraint
     * @return $this
     */
    public function addConstraint(ConstraintInterface $constraint);
}
