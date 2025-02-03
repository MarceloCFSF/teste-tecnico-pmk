<?php

namespace Config;

use App\Helpers\EnvHelper;
use Exception;
use PDO;
use PDOException;

EnvHelper::loadEnv();

class Database
{
  private PDO $pdo;

  public function __construct()
  {
    $host = getenv('DB_HOST');
    $port = getenv('DB_PORT');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASS');
    $dbname = getenv('DB_NAME');

    try {
      $dsn = "mysql:host=" . $host . ";dbname=" . $dbname . ";port=" . $port;
      $this->pdo = new PDO($dsn, $user, $password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erro na conexão: " . $e->getMessage());
    }
  }

  public function getConnection(): PDO
  {
    return $this->pdo;
  }
}
