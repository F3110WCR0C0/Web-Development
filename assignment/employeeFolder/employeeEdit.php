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
    $employeeProfile = EmployeeProfile::findDataBaseID($id);
    if ($employeeProfile === null) {
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
        <title>Form</title>
        <style>
            .error { color: red; }
        </style>
    </head>
    <body>
        <h2>Edit Employee Form</h2>
        <form action="../employeeFolder/employeeUpdate.php" method="POST">
            <input type="hidden" name="id" value="<?= $employeeProfile->id ?>">
            <p>
                Name: 
                <input type="text" name="name" value="<?= old("name", $employeeProfile->name) ?>">
                <span class="error"><?= error("name") ?><span>
            </p>
            <p>
                PPSM: 
                <input type="text" name="ppsn" value="<?= old("ppsn", $employeeProfile->ppsn) ?>">
                <span class="error"><?= error("ppsn") ?><span>
            </p>
            <p>
                Salary:
                <input type="text" name="salary" value="<?= old("salary", $employeeProfile->salary) ?>">
                <span class="error"><?= error("salary") ?><span>
            </p>
            <p>
                Department:
                <input type="radio" 
                       name="department_id" 
                       value="Outdoors & Shoes"    
                       <?= chosen("department_id", "Outdoors & Shoes", $employeeProfile->department_id)    ? "checked" : "" ?>
                >Outdoors & Shoes
                <input type="radio" 
                       name="department_id" 
                       value="Toys" 
                       <?= chosen("department_id", "Toys", $employeeProfile->department_id) ? "checked" : "" ?>
                >Toys
                <input type="radio" 
                       name="department_id" 
                       value="Garden & Shoes"    
                       <?= chosen("department_id", "Garden & Shoes", $employeeProfile->department_id)    ? "checked" : "" ?>
                >Garden & Shoes
                <span class="error"><?= error("department_id") ?><span>
            </p>

            <button type="submit">Update</button>
            <a href="../employeeFolder/index.php">Cancel</a>
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