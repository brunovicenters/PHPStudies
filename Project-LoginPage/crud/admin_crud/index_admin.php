<?php
// It starts the session --
session_start();

// It checks if the session variable doesn't exist --
if (!isset($_SESSION["admin_login"])) {
    // redirect to "login" page --
    header("Location:login.php");

    // stops the code --
    exit();
}

// Require the DB connection file --
require_once('../../connection/connection.php');

// Create the sql line to find all admins --
$sql = "SELECT * FROM `administrator`";

// It prepares the query --
$query = $pdo->prepare($sql);

// It executes the query --
$query->execute();

// It stores the result in a array --
$admins = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Imports a head template -->
<?php include "../../template/head.php"; ?>

<body>
    <div class="container">
        <div class="row">
            <h1 class="h1 text-center mt-3">Admins on DataBase:</h1>
            <div class="container col-md-4 offset-md-4 text-center">
                <!-- It checks the GET variable to show specific message -->
                <?php if (isset($_GET['warningDel'])) { ?>
                    <p class="text-warning">Admin deleted!</p>
                <?php } ?>
                <?php if (isset($_GET['errorDel'])) { ?>
                    <p class="text-danger">Admin don't exist!</p>
                <?php } ?>
                <?php if (isset($_GET['errorEdit'])) { ?>
                    <p class="text-danger">There is no id like this</p>
                <?php } ?>
                <?php if (isset($_GET['successEdit'])) { ?>
                    <p class="text-success">Succesfuly updated admin</p>
                <?php } ?>
                <a type="btn" class="btn btn-warning text center" href="register_admin.php">Register admin</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">User</th>
                            <th scope="col">Active</th>
                            <th scope="col" colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Create a foreach for admins + Create a counter of admins -->
                        <?php
                        $counter = 1;
                        foreach ($admins as $admin) :
                        ?>
                            <tr>
                                <!-- It shows the admin counter -->
                                <th scope="row"><?= $counter ?></th>
                                <!-- It shows de admin id -->
                                <td><?= $admin['id'] ?></td>
                                <!-- It shows de admin user -->
                                <td><?= $admin['admin_user'] ?></td>
                                <!-- It shows de admin status -->
                                <td><?= $admin['admin_active'] ?></td>
                                <td>
                                    <!-- It sends a request to edit page -->
                                    <a href="/PHPStudies/Project-LoginPage/crud/admin_crud/edit_admin.php?id=<?= $admin['id'] ?>" class="btn btn-outline-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <!-- It sends a request to delete admin -->
                                    <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $counter++;
                        endforeach
                        ?>
                    </tbody>
                </table>
                <a href="/PHPStudies/Project-LoginPage/admin/admin_panel.php" class="btn btn-secondary">Go back</a>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure you want to delete admin <?= $admin['admin_user'] ?>?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <a href="/PHPStudies/Project-LoginPage/crud/admin_crud/delete_admin.php?id=<?= $admin['id'] ?>" type="btn" class="btn btn-danger">Delete</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>