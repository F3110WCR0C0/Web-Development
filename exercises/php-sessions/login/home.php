<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"])) {
    echo "You are not logged in.";
    exit();
}
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Hello, <?php echo $username; ?>!</h1>
    <p>You are now logged in.</p>
    <p><a href="logout.php">Logout</a></p>
    <p><a href="index.php">Index</a></p>
</body>
</html>