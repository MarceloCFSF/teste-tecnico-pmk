<?php

namespace App\Handlers;

class FormHandler {
  private array $old = [];
  private $errors = [];

  public function __construct() {
    $this->old = $_SESSION['old'] ?? [];
    $this->errors = $_SESSION['errors'] ?? [];

    unset($_SESSION['errors'], $_SESSION['old']);
  }

  public function old(string $field): string
  {
    return isset($this->old[$field]) 
      ? htmlspecialchars($this->old[$field], ENT_QUOTES, 'UTF-8') 
      : '';
  }

  public function error(string $field): string
  {
    return isset($this->errors[$field]) 
      ? '<div class="error">' . implode('<br>', $this->errors[$field]) . '</div>' 
      : '';
  }
}