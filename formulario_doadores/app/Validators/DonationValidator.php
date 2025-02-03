<?php

namespace App\Validators;

use App\DTOs\DonationDTO;
use App\Enums\PaymentType;

class DonationValidator {
  public static function validate(DonationDTO $donation): array {
    $errors = [];

    if ($donation->payment_interval === null) {
      $errors ['payment_interval'][] = "Campo intervalo é obrigatório";
    }
    
    if ($donation->value === null) {
      $errors ['value'][] = "Campo valor é obrigatório";
    }
    
    if ($donation->payment_type === null) {
      $errors ['payment_type'][] = "Campo forma de pagamento é obrigatório";
    } else {
      if ($donation->payment_type === PaymentType::debit) {
        if ($donation->account === null) {
          $errors ['account'][] = "Campo conta é obrigatório";
        }
      }
      
      if ($donation->payment_type === PaymentType::credit) {
        if ($donation->first_card_numbers === null) {
          $errors ['first_card_numbers'][] = "Campo primeiros números do cartão é obrigatório";
        }
        
        if ($donation->last_card_numbers === null) {
          $errors ['last_card_numbers'][] = "Campo últimos números do cartão é obrigatório";
        }
      }
    }

    return $errors;
  }
}