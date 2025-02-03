<?php

namespace App\Controllers;

use App\DTOs\DonationDTO;
use App\DTOs\DonorDTO;
use App\Exceptions\ValidationException;
use App\Services\DonorService;

class DonorController {
  private DonorService $service;

  public function __construct(DonorService $service) { 
    $this->service = $service;
  }

  public function create()
  {
    require __DIR__ . '/../Views/donor/create.php';
  }

  public function store(array $data) {
    try {
      $donor = new DonorDTO($data);
      $donation = new DonationDTO($data);

      $this->service->create($donor, $donation);
      header('Location: success.php');
      exit;
    } catch (ValidationException $e) {
      $_SESSION['errors'] = $e->getErrors();
      $_SESSION['old'] = $_POST;
      header('Location: index.php');
      exit;
    }
  }
}