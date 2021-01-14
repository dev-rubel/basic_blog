<?php
$env = parse_ini_file("../.env");

if($env) {
	define('APP_NAME', $env['APP_NAME']);
	define('DB_HOST', $env['DB_HOST']);
	define('DB_USER', $env['DB_USER']);
	define('DB_PASS', $env['DB_PASS']);
	define('DB_NAME', $env['DB_NAME']);
	require_once '../app/init.php';

	$app = new App();

	$app->dispatch();
} else {
	die('.env not found.');
}