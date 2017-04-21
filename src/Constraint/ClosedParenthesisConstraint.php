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

namespace stringValidator\Constraint;

/**
 * Class ClosedParenthesisConstraint
 * @package manugarciaes\Constraint
 */
class ClosedParenthesisConstraint implements ConstraintInterface
{
    /**
     * @param string $string
     * @return bool
     */
    public function validate($string)
    {
        $open = substr_count($string, '(');
        $closed = substr_count($string, ')');

        if ($open != $closed) {
            return false;
        }

        $count = 0;
        foreach (str_split($string) as $letter) {
            if ($letter == '(') {
                $count++;
            } elseif ($letter == ')') {
                $count--;
            }
            if ($count < 0) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return "Mismatched Parenthesis";
    }
}
