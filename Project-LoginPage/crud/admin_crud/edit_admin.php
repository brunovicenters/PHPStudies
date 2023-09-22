<?php
session_start();

require_once('../../connection/connection.php');

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM administrator WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute([$_GET['id']]);
    $admin = $query->fetch(PDO::FETCH_ASSOC);
    if (!$admin) {
        header("Location:index_admin.php?errorEdit");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include "../../template/head.php"; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h2 text-center mt-3 mb-5">Edit Admin <?= $admin['admin_user'] ?></h2>
                <form action="../admin_crud/update_admin.php?id=<?= $admin["id"] ?>" method="post" class="col-md-12">
                    <label class="form-label col-md-12" for="user">User:</label>
                    <input class="form-control col-md-12 mt-2 mb-3" type="text" name="user" id="user" value="<?= $admin["admin_user"] ?>" required>
                    <label class="form-label col-md-12 mb-2" for="password">Password:</label>
                    <input class="form-control col-md-12 mt-2 mb-3" type="password" name="password" id="password" value="<?= $admin["admin_password"] ?>" required>
                    <label class="form-label col-md-12 mb-2" for="active">Active:</label>
                    <input class="form-control col-md-12 mt-2 mb-3" type="number" min="0" max="1" name="active" id="active" value="<?= $admin["admin_active"] ?>" required>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>