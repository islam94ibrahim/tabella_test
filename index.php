<?php

include_once 'server/Request.php';
include_once 'server/Router.php';

// make sure we are using the same session
session_start();

// Get client ip
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

// Save client country to global variable with the help of hostip API country detector
$GLOBALS['country'] = @file_get_contents("http://api.hostip.info/country.php?ip=$ip");

// Init app Request and Router
$router = new Router(new Request);

// Register endpoint
$router->get('/', function () {
    isset($_SESSION['user']) ? include('pages/movies.php') : include('pages/login.php');
});
