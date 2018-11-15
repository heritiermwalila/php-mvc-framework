<?php
//start session
session_start();

/**
 * Define constant
 */
defined ("DS") || define('DS', DIRECTORY_SEPARATOR);

//define ROOT Directory
defined("ROOT") || define("ROOT", dirname(__FILE__));

//Explode the url
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

require_once(ROOT . DS . 'core' . DS . 'bootstrap.php');

