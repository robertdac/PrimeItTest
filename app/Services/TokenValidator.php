<?php

    namespace App\Services;

    class TokenValidator
    {
        /**
         * Validates if a string containing parentheses and brackets.
         *
         * @param string $input The string to be validated.
         * @return bool Returns true if the string is balanced, false if it is not.
         */
        public function validateFormat(string $input): bool
        {
            $stack = [];
            $open = ['{', '(', '['];
            $close = ['}' => '{', ')' => '(', ']' => '['];

            foreach (str_split($input) as $char) {
                if (in_array($char, $open)) {
                    array_push($stack, $char);
                }

                if (isset($close[$char]) && end($stack) == $close[$char]) {
                    array_pop($stack);
                }

                if (!in_array($char, $open) && !isset($close[$char])) {
                    return false;
                }
            }

            return empty($stack);
        }
    }
