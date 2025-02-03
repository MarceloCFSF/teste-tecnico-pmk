<?php

namespace App\Repositories;

use App\DTOs\DonorDTO;
use PDO;

class DonorRepository {
  private PDO $pdo;
  public $errors;

  public function __construct(PDO $pdo) {
    $this->pdo = $pdo; 
  }

  public function create(DonorDTO $donor) {
    $query = "INSERT INTO donors (
      name,
      email,
      cpf,
      phone,
      birthday,
      street,
      address_number,
      neighborhood,
      state,
      city
    ) VALUES (
      :name,
      :email,
      :cpf,
      :phone,
      :birthday,
      :street,
      :address_number,
      :neighborhood,
      :state,
      :city
    )";
    $params = [
      'name' => $donor->name,
      'email' => $donor->email,
      'cpf' => $donor->cpf,
      'phone' => $donor->phone,
      'birthday' => $donor->birthday,
      'street' => $donor->street,
      'address_number' => $donor->address_number,
      'neighborhood' => $donor->neighborhood,
      'state' => $donor->state,
      'city' => $donor->city
    ];

    $smt = $this->pdo->prepare($query);

    return $smt->execute($params);
  }
}