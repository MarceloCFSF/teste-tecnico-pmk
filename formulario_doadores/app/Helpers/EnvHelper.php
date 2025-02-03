<?php

namespace App\Helpers;

class EnvHelper
{
  public static function loadEnv($file = '.env')
  {
    $lines = file($file);

    foreach ($lines as $line) {
      if (empty($line) || $line[0] === '#') {
        continue;
      }

      list($key, $value) = explode('=', $line, 2);
      putenv(trim($key) . '=' . trim($value));
    }
  }
}
