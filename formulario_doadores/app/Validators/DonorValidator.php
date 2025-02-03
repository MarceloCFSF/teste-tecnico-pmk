<?php

namespace App\Validators;

use App\DTOs\DonorDTO;
use App\Helpers\ValidationHelper;

class DonorValidator {
  public static function validate (DonorDTO $donor): array {
    $errors = [];

    if ($donor->name === '') {
      $errors['name'][] = "Campo nome é obrigatório";
    }
    
    if ($donor->email === '') {
      $errors['email'][] = "Campo email é obrigatório";
    } else if (!filter_var($donor->email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'][] = "Digite um email valido";
    }

    if ($donor->cpf === '') {
      $errors['cpf'][] = "Campo CPF é obrigatório";
    } else if (!ValidationHelper::validateCPF($donor->cpf)) {
      $errors['cpf'][] = "Digite um CPF valido";
    }

    if ($donor->phone === '') {
      $errors['phone'][] = "Campo telefone é obrigatório";
    }

    if ($donor->birthday === '') {
      $errors['birthday'][] = "Campo data de nascimento é obrigatório";
    }
    
    if ($donor->street === '') {
      $errors['street'][] = "Campo rua/avenida é obrigatório";
    }
    
    if ($donor->address_number === '') {
      $errors['address_number'][] = "Campo número é obrigatório";
    }
    
    if ($donor->neighborhood === '') {
      $errors['neighborhood'][] = "Campo bairro é obrigatório";
    }
    
    if ($donor->state === '') {
      $errors['state'][] = "Campo estado é obrigatório";
    }
    
    if ($donor->city === '') {
      $errors['city'][] = "Campo cidade é obrigatório";
    }

    return $errors;
  }
}