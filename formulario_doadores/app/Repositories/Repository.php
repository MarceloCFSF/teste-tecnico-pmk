<?php

namespace App\Repositories;

use PDO;

abstract class Repository
{
  protected PDO $pdo;

  public function beginTransaction(): void
  {
    $this->pdo->beginTransaction();
  }

  public function commit(): void
  {
    $this->pdo->commit();
  }

  public function rollBack(): void
  {
    $this->pdo->rollBack();
  }

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }
}
