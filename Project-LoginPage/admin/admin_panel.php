<?php
session_start();

if (!isset($_SESSION["admin_login"])) {
    // redirect to another location --
    header("Location:login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include "../template/head.php" ?>

<body>
    <h1 class="h1 text-center mt-3">Welcome, Admin!</h1>
    <div class="container d-flex flex-column gap-2 justify-content-center col-md-2">
        <a type="btn" class="btn btn-info text center" href="register_product.php">Register product</a>
        <a type="btn" class="btn btn-warning text center" href="register_admin.php">Register admin</a>
    </div>
</body>

</html>