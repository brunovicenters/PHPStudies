<?php
session_start();
if (!isset($_SESSION["admin_login"])) {
    // redirect to another location --
    header("Location:login.php");
    exit();
} ?>

<!DOCTYPE html>
<html lang="en">

<?php include "../template/head.php"; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h2 text-center mt-3 mb-5">Register Admin</h2>
                <form action="../crud/admin_crud/new_admin.php" method="post" class="col-md-12">
                    <label class="form-label col-md-12" for="user">User:</label>
                    <input class="form-control col-md-12 mt-2 mb-3" type="text" name="user" id="user" required>
                    <label class="form-label col-md-12 mb-2" for="password">Password:</label>
                    <input class="form-control col-md-12 mt-2 mb-3" type="password" name="password" id="password" required>
                    <button type="submit" class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php

?>