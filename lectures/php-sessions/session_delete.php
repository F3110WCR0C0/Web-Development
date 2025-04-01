<?php 
// a session is started/resumed by calling the session_start() function
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['fav-color'])) {
    unset($_SESSION['fav-color']);
}
if (isset($_SESSION['fav-animal'])) {
    unset($_SESSION['fav-animal']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete session data</title>
</head>
<body>
    <?php
    echo "Session variables were deleted!";
    ?>
</body>
</html>