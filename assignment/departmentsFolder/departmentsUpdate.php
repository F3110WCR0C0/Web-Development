<?php
require_once "../etc/config.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }
    if (!array_key_exists("id", $_POST)) {
        throw new Exception("Invalid request parameters");
    }
    $id = $_POST["id"];
    $departmentsProfile = DepartmentsProfile::findDataBaseID($id);
    if ($departmentsProfile === null) {
        throw new Exception("Profile not found");
    }
    $validator = new DepartmentsFormValidator($_POST);
    $valid = $validator->validate();
    if ($valid) {
        $data = $validator->data();
        $departmentsProfile->title = $data["title"];
        $departmentsProfile->location = $data["location"];
        $departmentsProfile->website = $data["website"];
        $departmentsProfile->save();
        redirect("../departmentsFolder/departments.php");
    }
    else {
        $errors = $validator->errors();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["form-data"] =  $_POST;
        $_SESSION["form-errors"] = $errors;
        redirect("../departmentsFolder/departmentsEdit.php?id=$id");
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}

?>