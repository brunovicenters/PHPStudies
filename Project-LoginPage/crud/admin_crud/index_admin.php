<?php
session_start();

if (!isset($_SESSION["admin_login"])) {
    // redirect to another location --
    header("Location:login.php");
    exit();
}

require_once('../../connection/connection.php');

$sql = "SELECT * FROM `administrator`";

$query = $pdo->prepare($sql);
$query->execute();

$admins = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<?php include "../../template/head.php"; ?>

<body>
    <div class="container">
        <div class="row">
            <h1 class="h1 text-center mt-3">Admins on DataBase:</h1>
            <div class="container col-md-4 col-md-offset-4 text-center">
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
                        <?php
                        $counter = 1;
                        foreach ($admins as $admin) :
                        ?>
                            <tr>
                                <th scope="row"><?= $counter ?></th>
                                <td><?= $admin['id'] ?></td>
                                <td><?= $admin['admin_user'] ?></td>
                                <td><?= $admin['admin_active'] ?></td>
                                <td>
                                    <a href="/PHPStudies/Project-LoginPage/crud/admin_crud/edit_admin.php?id=<?= $admin['id'] ?>" class="btn btn-outline-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="/PHPStudies/Project-LoginPage/crud/admin_crud/delete_admin.php?id=<?= $admin['id'] ?>" class="btn btn-outline-danger">
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
            </div>
        </div>
    </div>
</body>

</html>