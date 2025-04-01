<?php
require_once "./etc/config.php";

try {
    // test the CreditCard class
}
catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>