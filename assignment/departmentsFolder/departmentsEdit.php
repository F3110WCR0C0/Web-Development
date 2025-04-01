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
    $departmentsProfile = DepartmentsProfile::findDataBaseID($id);
    if ($departmentsProfile === null) {
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
        <title>Edit Departments Form</title>
        <style>
            .error { color: red; }
        </style>
    </head>
    <body>
        <h2>Edit Departments Form</h2>
        <form action="../departmentsFolder/departmentsUpdate.php" method="POST">
            <input type="hidden" name="id" value="<?= $departmentsProfile->id ?>">
            <p>
                Title: 
                <input type="text" name="title" value="<?= old("title", $departmentsProfile->title) ?>">
                <span class="error"><?= error("title") ?><span>
            </p>
            <p>
                Location: 
                <input type="text" name="location" value="<?= old("location", $departmentsProfile->location) ?>">
                <span class="error"><?= error("location") ?><span>
            </p>
            <p>
                Website:
                <input type="text" name="website" value="<?= old("website", $departmentsProfile->website) ?>">
                <span class="error"><?= error("website") ?><span>
            </p>

            <button type="submit">Update</button>
            <a href="../departmentsFolder/departments.php">Cancel</a>
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