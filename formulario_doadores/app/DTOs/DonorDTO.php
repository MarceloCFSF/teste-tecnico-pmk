<?php

namespace App\DTOs;

use App\Helpers\ValidationHelper;

class DonorDTO {
  public string $name;
  public string $email;
  public int $cpf;
  public int $phone;
  public string $birthday;
  public string $street;
  public string $address_number;
  public string $neighborhood;
  public string $state;
  public string $city;

  public function __construct(array $data)
  {
    $this->name = $data['name'] ?? '';
    $this->email = $data['email'] ?? '';
    $this->cpf = (int)ValidationHelper::cleanNumeric($data['cpf'] ?? '');
    $this->phone = (int)ValidationHelper::cleanNumeric($data['phone'] ?? '');
    $this->birthday = $data['birthday'] ?? '';
    $this->street = $data['street'] ?? '';
    $this->address_number = $data['address_number'] ?? '';
    $this->neighborhood = $data['neighborhood'] ?? '';
    $this->state = $data['state'] ?? '';
    $this->city = $data['city'] ?? '';
  }  
}
