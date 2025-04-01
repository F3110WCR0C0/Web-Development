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
        throw new Exception("Profile not found");
    }
    $projectsProfile->delete();
    // redirect the browser to the index page
    redirect("../projectsFolder/projects.php");
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>