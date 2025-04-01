<?php
require_once "./etc/config.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }
    if (!array_key_exists("id", $_POST)) {
        throw new Exception("Invalid request parameters");
    }
    $id = $_POST["id"];
    $profile = Profile::findById($id);
    if ($profile === null) {
        throw new Exception("Profile not found");
    }
    $validator = new ProfileFormValidator($_POST);
    $valid = $validator->validate();
    if ($valid) {
        $data = $validator->data();
        $data["languages"] = implode(", ", $data["languages"]);
        $profile->name = $data["name"];
        $profile->age = $data["age"];
        $profile->category = $data["category"];
        $profile->experience = $data["experience"];
        $profile->languages = $data["languages"];
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
        redirect("profile_edit.php?id=$id");
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>