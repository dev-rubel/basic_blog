<?php
session_start();

// base
$root=(isset($_SERVER["HTTPS"]) ? "https://" : "http://").$_SERVER["HTTP_HOST"];
$root.= str_replace(basename($_SERVER["SCRIPT_NAME"]), "", $_SERVER["SCRIPT_NAME"]);

define('BASE', $root);
define('BASE_URL', str_replace('/public','',BASE));
define('CURRENT_URL', isset($_SERVER["HTTPS"]) ? "https://" : "http://"."$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

require_once 'helpers.php';
require_once 'core/Base.php';
require_once 'core/App.php';
require_once 'core/Controller.php';