<?php

session_start(); // make sure we are using the same session

if ($_POST['username'] === 'test' && $_POST['password'] === 'test') {
    $_SESSION['user'] = $_POST['username'];
} else {
    http_response_code('400');
}
