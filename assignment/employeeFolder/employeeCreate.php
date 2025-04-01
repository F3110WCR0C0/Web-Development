<?php
require_once "../etc/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employee Form</title>
        <style>
            .error { color: red; }
        </style>
    </head>
    <body>
        <h2>Create Employee Form Form</h2>
        <form action="../employeeFolder/employeeStore.php" method="POST">
            <p>
                Name: 
                <input type="text" name="name" value="<?= old("name") ?>">
                <span class="error"><?= error("name") ?><span>
            </p>
            <p>
                ppsn: 
                <input type="text" name="ppsn" value="<?= old("ppsn") ?>">
                <span class="error"><?= error("ppsn") ?><span>
            </p>
            <p>
                salary:
                <input type="text" name="salary" value="<?= old("salary") ?>">
                <span class="error"><?= error("salary") ?><span>
            </p>
            <p>
                department ID:
                <input type="radio" 
                       name="department_id" 
                       value="Outdoors & Shoes"    
                       <?= chosen("department_id", "Outdoors & Shoes")    ? "checked" : "" ?>
                >Outdoors & Shoes
                <input type="radio" 
                       name="department_id" 
                       value="Toys" 
                       <?= chosen("department_id", "Toys") ? "checked" : "" ?>
                >Toys
                <input type="radio" 
                       name="department_id" 
                       value="Garden & Shoes"    
                       <?= chosen("department_id", "Garden & Shoes")    ? "checked" : "" ?>
                >Garden & Shoes
                <span class="error"><?= error("department_id") ?><span>
            </p>

            <button type="submit">Store</button>
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