<?php

include_once 'server/Request.php';
include_once 'server/Router.php';

// make sure we are using the same session
session_start();

// Init app Request and Router
$router = new Router(new Request);

// Register endpoint
$router->get('/', function () {
    isset($_SESSION['user']) ? include('pages/movies.php') : include('pages/login.php');
});
