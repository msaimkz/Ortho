<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class GreaterPrice implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     public $element;

     public function __construct($element)
     {
         $this->element = $element; 
     }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value <= $this->element) {
            $fail('The :attribute must greater thon monthly price.');
        }
    }
}
