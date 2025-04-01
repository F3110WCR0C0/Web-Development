<?php
require_once "./etc/config.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }
    $validator = new ProfileFormValidator($_POST);
    $valid = $validator->validate();
    if ($valid) {
        $data = $validator->data();
        $data["languages"] = implode(",", $data["languages"]);
        $profile = new Profile($data);
        $profile->save();
        redirect("index.php");
    }
    else {
        $errors = $validator->errors();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["form-data"] =  $_POST;
        $_SESSION["form-errors"] = $errors;
        redirect("profile_create.php");
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>