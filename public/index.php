<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Mhakkou\LearningTracker\Database\Connection;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

echo "Learning tracker is running \n";

