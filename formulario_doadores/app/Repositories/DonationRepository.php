<?php

namespace App\Repositories;

use App\DTOs\DonationDTO;
use PDO;

class DonationRepository
{
  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function create(DonationDTO $donation, int $donor_id)
  {
    $query = "INSERT INTO donations (
      payment_interval,
      value,
      payment_type,
      account,
      first_card_numbers,
      last_card_numbers,
      donor_id
    ) VALUES (
      :payment_interval,
      :value,
      :payment_type,
      :account,
      :first_card_numbers,
      :last_card_numbers,
      :donor_id
    )";

    $params = [
      "payment_interval" => $donation->payment_interval->value,
      "value" => $donation->value,
      "payment_type" => $donation->payment_type->value,
      "account" => $donation->account,
      "first_card_numbers" => $donation->first_card_numbers,
      "last_card_numbers" => $donation->last_card_numbers,
      "donor_id" => $donor_id
    ];

    $smt = $this->pdo->prepare($query);
    $smt->execute($params);

    return $this->pdo->lastInsertId();
  }
}
