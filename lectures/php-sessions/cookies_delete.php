<?php
$cookie_name = "user";
$path = "/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Cookies</title>
</head>
<body>
    <?php
    if (isset($_COOKIE[$cookie_name])) {
        unset($_COOKIE[$cookie_name]); 
        setcookie($cookie_name, '', -1, $path); 

        echo "Cookie $cookie_name has been deleted!";
    } else {
        echo "Cookie $cookie_name does not exist!";
    }
    ?>
</body>
</html>