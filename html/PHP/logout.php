<?php

session_start();

// Destroy the login session
session_destroy();

// Redirect to home page
header("Location: index.html");
exit();

?>
