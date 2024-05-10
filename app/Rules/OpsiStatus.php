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
        if ($value != 'menunggu konfirmasi' || $value != 'terkonfirmasi' || $value != 'selesai' || $value != 'batal') {
            $fail('opsi tidak ada');
        }
    }
}
