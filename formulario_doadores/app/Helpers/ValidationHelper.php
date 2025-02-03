<?php

namespace App\Helpers;

class ValidationHelper
{
  public static function cleanNumeric($number)
  {
    return preg_replace('/[^0-9]/', '', $number);
  }

  public static function validateCPF(string $cpf): bool
  {
    $cpf = self::cleanNumeric($cpf);

    if (strlen($cpf) != 11) {
      return false;
    }

    if (preg_match('/(\d)\1{10}/', $cpf)) {
      return false;
    }

    for ($t = 9; $t < 11; $t++) {
      for ($d = 0, $c = 0; $c < $t; $c++) {
        $d += $cpf[$c] * (($t + 1) - $c);
      }
      $d = ((10 * $d) % 11) % 10;
      if ($cpf[$c] != $d) {
        return false;
      }
    }

    return true;
  }
}
