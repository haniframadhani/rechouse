<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OpsiStatus implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $opsi = ["menunggu konfirmasi", "terkonfirmasi", "selesai", "batal"];
        if (!in_array($value, $opsi)) {
            $fail('opsi tidak ada');
        }
    }
}