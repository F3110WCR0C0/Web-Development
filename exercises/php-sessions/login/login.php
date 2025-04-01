<?php
$username = $_POST["username"];

// Store the username in the session
if (session_status( === PHP_SESSION_NONE)){
    session_start();
}
$_SESSION["username"] = $username;

require 'home.php';

// header("Location: home.php");
?>