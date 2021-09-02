<?php
namespace App\HerokuDemoApp;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

define('HOST', $_ENV['MYSQL_HOST']);
define('DB_NAME', $_ENV['DB_NAME']);
define('USERNAME', $_ENV['USER_NAME']);
define('PASSWORD', $_ENV['DB_PASSWORD']);

