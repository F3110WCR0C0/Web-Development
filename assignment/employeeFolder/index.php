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
        <title>Employees - Main Page</title>
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
        <h1>Employees - Main Page</h1>
        <p><a href="../departmentsFolder/departments.php">Departments Table</a></p>
        <p><a href="../projectsFolder/projects.php">Projects Table</a></p>
        <p><a href="../employeeProjectFolder/employeeProject.php">Employee Project Table</a></p>
        <br>
        <p><a href="../employeeFolder/employeeCreate.php">Create profile</a></p>
        <?php if (count($employees) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>PPSN</th>
                        <th>Name</th>
                        <th>salary</th>
                        <th>Departmet ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                            <?php foreach ($employees as $employeeProfile): ?>
                            <td><?= $employeeProfile->ppsn ?></td>
                            <td><?= $employeeProfile->name ?></td>
                            <td><?= $employeeProfile->salary ?></td>
                            <td><?= $employeeProfile->department_id  ?> <a href="../infoFolder/departmentsID.php">View</a></td>
                            <td>
                                <a href="../employeeFolder/employeeEdit.php?id=<?= $employeeProfile->id ?>">Edit</a>
                                <form class="form-delete" action="../employeeFolder/employeeDelete.php" method="post">
                                    <input type="hidden" name="id" value="<?= $employeeProfile->id ?>">
                                    <input type="submit" value="Delete">
                                </form>
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
