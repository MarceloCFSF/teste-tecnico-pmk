<?php

namespace App\Enums;

enum PaymentType: string
{
  case credit = "credit";
  case debit = "debit";
}
