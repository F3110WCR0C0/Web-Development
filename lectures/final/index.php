<?php
require_once './etc/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$profiles = Profile::findAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profiles</title>
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
        <h1>Profiles</h1>
        <p><a href="profile_create.php">Create profile</a></p>
        <?php if (count($profiles) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Category</th>
                        <th>Experience</th>
                        <th>Languages</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($profiles as $profile): ?>
                        <tr>
                            <td><?= $profile->name ?></td>
                            <td><?= $profile->age ?></td>
                            <td><?= $profile->category ?></td>
                            <td><?= $profile->experience ?></td>
                            <td><?= $profile->languages ?></td>
                            <td>
                                <a href="profile_edit.php?id=<?= $profile->id ?>">Edit</a>
                                <form class="form-delete" action="profile_delete.php" method="post">
                                    <input type="hidden" name="id" value="<?= $profile->id ?>">
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No profiles found</p>
        <?php endif; ?>
    </body>
</html>