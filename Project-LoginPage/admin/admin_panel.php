<?php
session_start();

if (!isset($_SESSION["admin_login"])) {
    // redirect to another location --
    header("Location:Login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include "../template/head.php" ?>

<body>
    <h1 class="h1 text-center">Welcome, Admin!</h1>
</body>

</html>