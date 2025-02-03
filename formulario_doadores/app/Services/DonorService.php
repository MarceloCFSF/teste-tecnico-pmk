<?php

namespace App\Services;

use App\DTOs\DonorDTO;
use App\Exceptions\ValidationException;
use App\Repositories\DonorRepository;
use App\Validators\DonorValidator;

class DonorService {
  private DonorRepository $repository;

  public function __construct(DonorRepository $repository)
  {
    $this->repository = $repository; 
  }

  public function create(DonorDTO $dto)
  {
    $errors = DonorValidator::validate($dto);

    if (!empty($errors)) {
      throw new ValidationException($errors);
    }

    $this->repository->create($dto);
  }
}