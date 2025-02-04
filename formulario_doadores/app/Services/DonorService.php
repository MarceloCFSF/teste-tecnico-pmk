<?php

namespace App\Services;

use App\DTOs\DonationDTO;
use App\DTOs\DonorDTO;
use App\Enums\PaymentType;
use App\Exceptions\ValidationException;
use App\Repositories\DonationRepository;
use App\Repositories\DonorRepository;
use App\Validators\DonationValidator;
use App\Validators\DonorValidator;
use Exception;

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

    if ($donation->payment_type === PaymentType::credit) {
      if ($this->donationRepository->checkIfCardExist(
        $donation->first_card_numbers,
        $donation->last_card_numbers
      )) {
        $cardErrors['credit_card'][] = "Não foi possível cadastrar esse número de cartão, entre em contato com o seu supervisor";
        $errors = array_merge($errors, $cardErrors);
      }
    }

    if (!empty($errors)) {
      throw new ValidationException($errors);
    }

    try {
      $this->donorRepository->beginTransaction();
      $donor_id = $this->donorRepository->create($donor);
      $this->donationRepository->create($donation, $donor_id);
      $this->donorRepository->commit();
    } catch (Exception $e) {
      $this->donorRepository->rollBack();
      throw new Exception("Erro ao criar doação: " . $e->getMessage());
    }
  }
}