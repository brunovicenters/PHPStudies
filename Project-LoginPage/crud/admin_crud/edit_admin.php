<?php
// It starts the session --
session_start();

// Require the DB connection file --
require_once('../../connection/connection.php');

// It checks if the GET "id" value exists --
if (isset($_GET['id'])) {
    // Create the sql line to find the admin --
    $sql = "SELECT * FROM administrator WHERE id=?";

    // It prepares the query --
    $query = $pdo->prepare($sql);

    // It executes the query using the GET id value as param --
    $query->execute([$_GET['id']]);

    // It stores the query result in a variable --
    $admin = $query->fetch(PDO::FETCH_ASSOC);

    // It checks if it exists --
    if (!$admin) {
        // Redirects you to the "index admin" page, with a GET value --
        header("Location:index_admin.php?errorEdit");

        // Stops the code --
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Imports the head template -->
<?php include "../../template/head.php"; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- It shows the admin name -->
                <h2 class="h2 text-center mt-3 mb-5">Edit Admin <?= $admin['admin_user'] ?></h2>
                <!-- It sends a request to "update admin" with the admin id -->
                <form action="../admin_crud/update_admin.php?id=<?= $admin["id"] ?>" method="post" class="col-md-12">
                    <label class="form-label col-md-12" for="user">User:</label>
                    <!-- It values the admin name -->
                    <input class="form-control col-md-12 mt-2 mb-3" type="text" name="user" id="user" value="<?= $admin["admin_user"] ?>" required>
                    <label class="form-label col-md-12 mb-2" for="password">Password:</label>
                    <!-- It values the admin password -->
                    <input class="form-control col-md-12 mt-2 mb-3" type="password" name="password" id="password" value="<?= $admin["admin_password"] ?>" required>
                    <label class="form-label col-md-12 mb-2" for="active">Active:</label>
                    <!-- It values the admin state(active or not) -->
                    <input class="form-control col-md-12 mt-2 mb-3" type="number" min="0" max="1" name="active" id="active" value="<?= $admin["admin_active"] ?>" required>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>