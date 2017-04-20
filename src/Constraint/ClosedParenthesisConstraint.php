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

        $positionsOpen = $this->getCountPosition($string, '(');
        $positionsClosed = $this->getCountPosition($string, ')');

        if ($positionsOpen > $positionsClosed) {
            return false;
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

    /**
     * Calculate position of open parenthesis and closed
     * Sum positions, always closed position are bigger than open
     * @param string $string
     * @param string $search
     * @return int
     */
    private function getCountPosition($string, $search)
    {
        $lastPosition = 0;
        $positions = 0;
        while (($lastPosition = strpos($string, $search, $lastPosition)) !== false) {
            $positions += intval($lastPosition);
            $lastPosition++;
            if ($lastPosition > strlen($string)) {
                break;
            }
        }

        return $positions;
    }

}