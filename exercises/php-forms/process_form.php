<?php
require_once './etc/global.php';
require_once "./etc/config.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }

    $validator = new CreditCardFormValidator($_POST);
    $valid = $validator->validate();
    if($valid) {
        redirect('success.php');
    }
    else {
        $errors = $validator->errors();
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }
        $_SESSION["form-data"] = $_POST;
        $_SESSION["form-errors"] = $errors;
        redirect('form.php');
    }
}
catch (Exception $ex){
    echo $ex->getMessage();
    exit();
}


?>