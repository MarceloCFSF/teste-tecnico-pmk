<?php

namespace App\Services;

use App\DTOs\DonationDTO;
use App\DTOs\DonorDTO;
use App\Exceptions\ValidationException;
use App\Repositories\DonationRepository;
use App\Repositories\DonorRepository;
use App\Validators\DonationValidator;
use App\Validators\DonorValidator;

class DonorService {
  private DonorRepository $donorRepository;
  private DonationRepository $donationRepository;

  public function __construct(
    DonorRepository $donorRepository,
    DonationRepository $donationRepository
  )
  {
    $this->donorRepository = $donorRepository; 
    $this->donationRepository = $donationRepository; 
  }

  public function create(DonorDTO $donor, DonationDTO $donation)
  {
    $donorErrors = DonorValidator::validate($donor);
    $donationErrors = DonationValidator::validate($donation);
    $errors = array_merge($donorErrors, $donationErrors);

    if (!empty($errors)) {
      throw new ValidationException($errors);
    }

    $donor_id = $this->donorRepository->create($donor);
    $this->donationRepository->create($donation, $donor_id);
  }
}