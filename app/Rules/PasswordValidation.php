<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (preg_match('/^.*(?=.{8,}).*$/', $value) == false) {
            $fail('minimal 8 karakter');
        }
        if (preg_match('/^.*(?=.*[a-z]).*$/', $value) == false) {
            $fail('harus terdapat huruf kecil');
        }
        if (preg_match('/^.*(?=.*[A-Z]).*$/', $value) == false) {
            $fail('harus terdapat huruf besar');
        }
        if (preg_match('/^.*(?=.*\d).*$/', $value) == false) {
            $fail('harus terdapat angka');
        }
    }
}