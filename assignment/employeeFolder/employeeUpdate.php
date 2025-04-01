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
    $employeeProfile = EmployeeProfile::findDataBaseID($id);
    if ($employeeProfile === null) {
        throw new Exception("Profile not found");
    }
    $validator = new employeeFormValidator($_POST);
    $valid = $validator->validate();
    if ($valid) {
        $data = $validator->data();
        $employeeProfile->name = $data["name"];
        $employeeProfile->ppsn = $data["ppsn"];
        $employeeProfile->salary = $data["salary"];
        $employeeProfile->department_id = $data["department_id"];
        $employeeProfile->save();
        redirect("../employeeFolder/index.php");
    }
    else {
        $errors = $validator->errors();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["form-data"] =  $_POST;
        $_SESSION["form-errors"] = $errors;
        redirect("../employeeFolder/employeeEdit.php?id=$id");
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}

?>