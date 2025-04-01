<?php
// Write PHP uses a cookie to keep track of the number of times 
// a user has visited this page.

$visit_count = 0;
if (isset($_COOKIE["visit_count"])){
    $visit_count = $_COOKIE["visit_count"];
}
$visit_count += 1;
setcookie("visit_count", $visit_count, time() + (24 * 60 * 60), "/");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Visit count</title>
</head>
<body>
    <?php

    print("Visit count: $visit_count");    
?>
</body>
</html>