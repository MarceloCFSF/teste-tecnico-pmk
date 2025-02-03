<?php

namespace App\Enums;

enum PaymentInterval: string
{
  case unique = "unique";
  case bimonthly = "bimonthly";
  case semiAnnual = "semi-annual";
  case annual = "annual";
}
