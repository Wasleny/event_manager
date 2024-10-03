<?php

namespace App\Helpers;

/**
 * Class responsible for formatting CPF
 */
class FormatCPF
{
    /**
     * Method responsible for removing CPF mask
     */
    public static function removeCPFMask(string $cpf)
    {
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        return $cpf;
    }

    /**
     * Method responsible for adding CPF mask
     */
    public static function addCPFMask(string $cpf)
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
    }
}
