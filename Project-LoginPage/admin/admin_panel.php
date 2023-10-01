<?php
// It stars the session --
session_start();

// It checks if the session variable doesn't exist --
if (!isset($_SESSION["admin_login"])) {
    // redirect to "login" page --
    header("Location:login.php");

    // stops the code --
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Import head template -->
<?php include "../template/head.php" ?>

<body>
    <h1 class="h1 text-center mt-3">Welcome, Admin!</h1>
    <div class="container d-flex flex-column gap-2 justify-content-center col-md-2">
        <a type="btn" class="btn btn-info text center" href="register_product.php">Register product</a>
        <a type="btn" class="btn btn-primary text center" href="read_products.php">Show Products</a>
        <a type="btn" class="btn btn-primary text center" href="../crud/admin_crud/index_admin.php">Show admins</a>
    </div>

    <!-- In case there's "success" or "error" as a GET value, show message -->
    <?php if (isset($_GET['success'])) {
        echo "<p class='text-success mt-3'>Admin created!</p>";
    } else if (isset($_GET['error'])) {
        echo "<p class='text-success mt-3'>Error while creating admin!</p>";
    } ?>
</body>

</html>