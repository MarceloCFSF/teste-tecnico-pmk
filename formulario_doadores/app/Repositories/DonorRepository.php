<?php

namespace App\Repositories;

use App\DTOs\DonorDTO;
use PDO;

class DonorRepository extends Repository
{
  public function create(DonorDTO $donor): int {
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
    $smt->execute($params);

    return $this->pdo->lastInsertId();
  }
}