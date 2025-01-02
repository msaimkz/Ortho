<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class ValidDateOfBirth implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $date = Carbon::parse($value); 
        $today = Carbon::today();
        $minDate = $today->subYears(10); 
    
     
        if ($date->gte($today) && $date->gt($minDate)) {
           
            $fail('Date of birth must be at least 10 years old.');
        }
    }
    
}
