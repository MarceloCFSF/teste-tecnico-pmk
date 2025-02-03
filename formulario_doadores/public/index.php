<?php
require_once __DIR__ . '/../autoload.php';

use App\Controllers\DonorController;
use App\Repositories\DonationRepository;
use App\Repositories\DonorRepository;
use App\Services\DonorService;
use Config\Database;

session_start();

$database = new Database();

$donorRepository = new DonorRepository($database->getConnection());
$donationRepository = new DonationRepository($database->getConnection());
$service = new DonorService($donorRepository, $donationRepository);
$controller = new DonorController($service);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $controller->create();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $controller->store($_POST);
}
