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
    $departmentsProfile->delete();
    redirect("../departmentsFolder/departments.php");
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>