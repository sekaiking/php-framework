<?php
session_start();

if (!version_compare(PHP_VERSION, '5.4.0', '>=')) {
    exit("Required PHP_VERSION >= 5.4.0 , Your PHP_VERSION is : " . PHP_VERSION . "\n");
}

date_default_timezone_set('UTC');

define('R', $_SERVER['DOCUMENT_ROOT']);


require(R.'/libs/index.php');
require(R.'/config.php');
require(R.'/db.php');
require(R.'/core/functions.php');
require(R.'/src/app.php');
