<?php 
// a session is started/resumed by calling the session_start() function
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Destroy session</title>
</head>
<body>
    <?php
    session_destroy();
    $cookie_name = session_name();
    unset($_COOKIE[$cookie_name]); 
    setcookie($cookie_name, '', -1, '/');
    echo "Session destroyed!";
    ?>
</body>
</html>