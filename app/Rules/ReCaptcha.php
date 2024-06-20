<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class ReCaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
    }

    public function passes($attribute, $value)

    {

        return $value === 'g-recaptcha-response';
    }

    /**

     * Get the validation error message.

     *

     * @return string

     */

    public function message()

    {

        return 'The google recaptcha is required.';
    }
}
