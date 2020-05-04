<?php

session_start(); // make sure we are using the same session
session_destroy(); // destroy the session

header("location: /"); // redirect back to "/login" after logging out
exit();
