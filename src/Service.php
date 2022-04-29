<?php

namespace AleksandrovEugen\BracketsChecker;

use InvalidArgumentException;

class Service
{
    /**
     * Checks if all parentheses are closed correctly in the specified string.
     *
     * Returns True if everything is correct.
     * The string can include parentheses, line breaks, tabs, carriage returns.
     * Otherwise an InvalidArgumentException exception will be thrown.
     *
     * @param string $string String to check
     * @throws InvalidArgumentException
     * @return bool
     */
    public function checkString(string $string): bool
    {
        $stringArray = str_split($string);

        $count = 0;
        $allowedChars = ['(', ')', ' ', '\t', '\n', '\r'];

        foreach ($stringArray as $char) {
            if (!in_array($char, $allowedChars)) {
                throw new InvalidArgumentException();
            }
            if ('(' === $char) {
                $count += 1;
            }

            if (')' === $char) {
                $count -= 1;
            }
        }

        return 0 === $count;
    }
}