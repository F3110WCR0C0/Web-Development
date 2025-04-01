<?php
require_once "../etc/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Departments Form</title>
        <style>
            .error { color: red; }
        </style>
    </head>
    <body>
        <h2>Create Departments Profile Form</h2>
        <form action="../departmentsFolder/departmentsStore.php" method="POST">
            <p>
                Title: 
                <input type="text" name="title" value="<?= old("title") ?>">
                <span class="error"><?= error("title") ?><span>
            </p>
            <p>
                Location: 
                <input type="text" name="location" value="<?= old("location") ?>">
                <span class="error"><?= error("location") ?><span>
            </p>
            <p>
                Website:
                <input type="text" name="website" value="<?= old("website") ?>">
                <span class="error"><?= error("website") ?><span>
            </p>

            <button type="submit">Store</button>
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