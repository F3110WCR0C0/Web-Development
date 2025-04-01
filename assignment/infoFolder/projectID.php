<?php
require_once '../etc/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$employees = EmployeeProjectProfile::findAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employee Project- Project ID</title>
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
        <h1>Employee Project- Project ID</h1>
        <p><a href="../employeeProjectFolder/employeeProject.php">Return</a></p>
        <br>
        <?php if (count($employees) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Project ID</th>
                        <th>Project</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                            <?php foreach ($employees as $employeeProfile): ?>
                                <td><?= $employeeProfile->project_id  ?> 
                                <td><?= ProjectsProfile::findDataBaseID($employeeProfile->project_id)->title ?></td>
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


