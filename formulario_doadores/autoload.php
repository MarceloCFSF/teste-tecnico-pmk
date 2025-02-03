<?php

spl_autoload_register(function ($class) {
  $prefixes = [
    'App' => __DIR__ . '/app/',
    'Config' => __DIR__ . '/config/',
  ];

  foreach ($prefixes as $prefix => $base_dir) {
    if (str_starts_with($class, $prefix)) {
      $relative_class = substr($class, strlen($prefix));
      $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
      if (file_exists($file)) {
        require_once $file;
        return;
      }
    }
  }
});
