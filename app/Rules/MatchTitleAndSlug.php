<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MatchTitleAndSlug implements ValidationRule
{
    /**
     * Run the validation rule.
     * 
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
      
       
        if (ucwords(str_replace('-', ' ', $value) ) != ucwords($this->element)) {
            $fail('The :attribute must match the title.');
        }
    }
}
