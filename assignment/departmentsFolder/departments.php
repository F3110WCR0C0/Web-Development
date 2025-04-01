<?php
require_once '../etc/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$employees = DepartmentsProfile::findAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Departments Table</title>
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
        <h1>Departments Table</h1>
        <p><a href="../employeeFolder/index.php">Return to Main Page</a></p>
        <br>
        <p><a href="../projectsFolder/projects.php">Projects Table</a></p>
        <p><a href="../employeeProjectFolder/employeeProject.php">Employee Project Table</a></p>
        <br>
        <p><a href="../departmentsFolder/departmentsCreate.php">Create profile</a></p>
        <?php if (count($employees) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $departmentsProfile): ?>
                        <tr>
                            <td><?= $departmentsProfile->id ?></td>
                            <td><?= $departmentsProfile->title ?></td>
                            <td><?= $departmentsProfile->location ?></td>
                            <td><?= $departmentsProfile->website ?></td>
                            <td>
                                <a href="../departmentsFolder/departmentsEdit.php?id=<?= $departmentsProfile->id ?>">Edit</a>
                                <form class="form-delete" action="../departmentsFolder/departmentsDelete.php" method="post">
                                    <input type="hidden" id="id" value="<?= $departmentsProfile->id ?>">
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