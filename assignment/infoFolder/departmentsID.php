<?php
require_once '../etc/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$employees = EmployeeProfile::findAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employees - departments ID</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 5px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            .form-delete {
                display: inline;
            }
        </style>
    </head>
    <body>
        <h1>Employees - departments ID</h1>
        <p><a href="../employeeFolder/index.php">Return</a></p>
        <br>
        <?php if (count($employees) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Department ID</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                            <?php foreach ($employees as $employeeProfile): ?>
                                <td><?= $employeeProfile->department_id  ?> 
                                <td><?= DepartmentsProfile::findDataBaseID($employeeProfile->department_id)->title ?></td>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No employees found</p>
        <?php endif; ?>
    </body>
</html>


