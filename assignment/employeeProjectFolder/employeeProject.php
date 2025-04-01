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
        <title>Employee Project Table</title>
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
        <h1>Employee Project Table</h1>
        <p><a href="../employeeFolder/index.php">Return to Main Page</a></p>
        <br>
        <p><a href="../projectsFolder/projects.php">Projects Table</a></p>
        <p><a href="../departmentsFolder/departments.php">Departments Table</a></p>
        <br>
        <?php if (count($employees) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Project ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employeeProjectProfile): ?>
                        <tr>
                            <td><?= $employeeProjectProfile->employee_id ?><a href="../infoFolder/employeeID.php">View</a></td>
                            <td><?= $employeeProjectProfile->project_id ?><a href="../infoFolder/projectID.php">View</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No employees found</p>
        <?php endif; ?>
    </body>
</html>