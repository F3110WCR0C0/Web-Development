<?php
require_once "../etc/config.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }
    $validator = new ProjectsFormValidator($_POST);
    $valid = $validator->validate();
    if ($valid) {
        $data = $validator->data();
        $projectsProfile = new ProjectsProfile($data);
        $projectsProfile->save();
        redirect("../projectsFolder/projects.php");
    }
    else {
        $errors = $validator->errors();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["form-data"] =  $_POST;
        $_SESSION["form-errors"] = $errors;
        redirect("../projectsFolder/projectsCreate.php");
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>