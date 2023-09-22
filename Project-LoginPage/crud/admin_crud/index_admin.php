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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">User</th>
                            <th scope="col">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 1;
                        foreach ($admins as $admin) :
                        ?>
                            <tr>
                                <th scope="row"><?= $counter ?></th>
                                <td><?= $admin['id'] ?> </td>
                                <td><?= $admin['admin_user'] ?></td>
                                <td><?= $admin['admin_active'] ?></td>
                            </tr>
                        <?php
                            $counter++;
                        endforeach
                        ?>
                    </tbody>
            </div>
        </div>
    </div>
</body>

</html>