<?php
require_once "../etc/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Invalid request method");
    }
    if (!array_key_exists("id", $_GET)) {
        throw new Exception("Invalid request parameters");
    }
    $id = $_GET["id"];
    $projectsProfile = ProjectsProfile::findDataBaseID($id);
    if ($projectsProfile === null) {
        throw new Exception("Profile not found");
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Projects Form</title>
        <style>
            .error { color: red; }
        </style>
    </head>
    <body>
        <h2>Edit Projects Form</h2>
        <form action="../projectsFolder/projectsUpdate.php" method="POST">
            <input type="hidden" name="id" value="<?= $projectsProfile->id ?>">
            <p>
                Title: 
                <input type="text" name="title" value="<?= old("title", $projectsProfile->title) ?>">
                <span class="error"><?= error("title") ?><span>
            </p>
            <p>
                Description: 
                <input type="text" name="description" value="<?= old("description", $projectsProfile->description) ?>">
                <span class="error"><?= error("description") ?><span>
            </p>
            <p>
                Start Date:
                <input type="date" name="start_date" value="<?= old("start_date", $projectsProfile->start_date) ?>">
                <span class="error"><?= error("start_date") ?><span>
            </p>

            <p>
                End Date:
                <input type="date" name="end_date" value="<?= old("end_date", $projectsProfile->end_date) ?>">
                <span class="error"><?= error("end_date") ?><span>
            </p>

            <button type="submit">Update</button>
            <a href="../projectsFolder/projects.php">Cancel</a>
        </form>
    </body>
</html>
<?php
if (array_key_exists("form-data", $_SESSION)) {
    unset($_SESSION["form-data"]);
}
if (array_key_exists("form-errors", $_SESSION)) {
    unset($_SESSION["form-errors"]);
}
?>