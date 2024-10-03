<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CPFRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cpf = $value;
        $invalid_sequences = [
            '00000000000',
            '11111111111',
            '22222222222',
            '33333333333',
            '44444444444',
            '55555555555',
            '66666666666',
            '77777777777',
            '88888888888',
            '99999999999'
        ];

        // Check if it's empty
        if (empty($cpf)) {
            $fail('CPF não informado.');
        }

        // Removes possible masks
        $cpf = preg_replace("/[^0-9]/", "", $cpf);

        // Complete the CPF with zeros on the left, if necessary
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Checks if the number of digits entered is equal to 11
        if (strlen($cpf) != 11) {
            $fail('Quantidade de dígitos errada.');

            // Checks if none of the invalid sequences were entered
        } elseif (in_array($cpf, $invalid_sequences, true)) {
            $fail('CPF inválido.');

            // Calculates the check digits to verify if the CPF is valid
        } else {
            for ($t = 9; $t < 11; $t++) {
                $d = 0;

                for ($c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;

                if ($cpf[$c] != $d) {
                    $fail('CPF inválido.');
                }
            }
        }
    }
}
