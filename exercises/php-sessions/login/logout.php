<?php
// Remove the username from the session
if (session_start() === PHP_SESSION_NONE){
    session_start();
}

if (isset($_SESSION['username'])){
    unsset($_SESSION['username']);
}
header("Location: index.php");
?>