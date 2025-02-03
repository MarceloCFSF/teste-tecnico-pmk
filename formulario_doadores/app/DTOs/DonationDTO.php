<?php

namespace App\DTOs;

use App\Enums\PaymentInterval;
use App\Enums\PaymentType;

class DonationDTO {
  public ?PaymentInterval $payment_interval;  
  public ?float $value;
  public ?PaymentType $payment_type;
  public ?int $account;
  public ?int $first_card_numbers;
  public ?int $last_card_numbers;

  public function __construct(array $data)
  {
    $this->payment_interval = PaymentInterval::tryFrom(
      $data['payment_interval'] ?? ''
    );
    $this->value = $data['value'] !== "" 
      ? intval($data['value']) 
      : null;
    $this->payment_type = PaymentType::tryFrom(
      $data['payment_type'] ?? ''
    );
    $this->account = $data['account'] !== "" 
      ? intval($data['account']) 
      : null;
    $this->first_card_numbers = $data['first_card_numbers'] !== "" 
      ? intval($data['first_card_numbers']) 
      : null;
    $this->last_card_numbers = $data['last_card_numbers'] !== "" 
      ? intval($data['last_card_numbers']) 
      : null;
  }
}