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
    $projectsProfile = ProjectsProfile::findDataBaseID($id);
    if ($projectsProfile === null) {
        throw new Exception("projectsProfile not found");
    }
    $validator = new ProjectsFormValidator($_POST);
    $valid = $validator->validate();
    if ($valid) {
        $data = $validator->data();
        $projectsProfile->title = $data["title"];
        $projectsProfile->description = $data["description"];
        $projectsProfile->start_date = $data["start_date"];    
        $projectsProfile->end_date = $data["end_date"];    
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
        redirect("../projectsFolder/projectsEdit.php?id=$id");
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}

?>