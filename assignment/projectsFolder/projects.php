<?php
require_once '../etc/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$employees = ProjectsProfile::findAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Projects Table</title>
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
        <h1>Projects Table</h1>
        <p><a href="../employeeFolder/index.php">Return to Main Page</a></p>
        <br>
        <p><a href="../departmentsFolder/departments.php">Departments Table</a></p>
        <p><a href="../employeeProjectFolder/employeeProject.php">Employee Project Table</a></p>        
        <br>
        <p><a href="../projectsFolder/projectsCreate.php">Create profile</a></p>
        <?php if (count($employees) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $projectsProfile): ?>
                        <tr>
                            <td><?= $projectsProfile->id ?></td>
                            <td><?= $projectsProfile->title ?></td>
                            <td><?= $projectsProfile->description ?></td>
                            <td><?= $projectsProfile->start_date ?></td>
                            <td><?= $projectsProfile->end_date ?></td>

                            <td>
                                <a href="../projectsFolder/projectsEdit.php?id=<?= $projectsProfile->id ?>">Edit</a>
                                <form class="form-delete" action="../projectsFolder/projectsDelete.php" method="post">
                                    <input type="hidden" id="id" value="<?= $projectsProfile->id ?>">
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