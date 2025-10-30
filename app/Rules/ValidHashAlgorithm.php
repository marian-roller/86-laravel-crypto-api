<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidHashAlgorithm implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $validAlgorithms = array_merge(hash_algos(), password_algos());

        return in_array($value, $validAlgorithms, true);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This is not valid algorithm.';
    }
}
