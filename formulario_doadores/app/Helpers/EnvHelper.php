<?php

namespace App\Helpers;

class EnvHelper
{
  public static function loadEnv($file = null)
  {
    if ($file === null) {
      $file = $_SERVER['DOCUMENT_ROOT'] . '/../.env';
    }

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
