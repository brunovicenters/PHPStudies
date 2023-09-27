<?php
session_start();
require_once('../connection/connection.php');
if (!isset($_SESSION["admin_login"])) {
    // redirect to another location --
    header("Location:login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['$description'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $url_img = $_POST['url_img'];

    $target_dir = "../assets/";
    $target_file = $target_dir . basename($img);

    $base_url = "http://localhost/PHPStudies/Project-LoginPage/";
    $url_img = $base_url . $target_file;

    if (move_uploaded_file($FILES['img']['tmp_name'], $target_file)) {
        echo "Image" . basename($img) . "was loaded";
    } else {
        echo "Failed to load image";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include "../template/head.php" ?>

<body>
    <h1 class="h1 text-center mt-3">Register Product</h1>
    <div class="container">
        <div class="row">
            <form action="" method="post" class="col-md-12" enctype="multipart/form-data">
                <label class="form-label col-md-12" for="name">Name:</label">
                    <input class="form-control col-md-12 mt-2 mb-3" type="text" name="name" id="name" required>
                    <label class="form-label col-md-12 mb-2" for="description">Description:</label>
                    <textarea class="form-control col-md-12 mt-2 mb-3" name="description" id="description" cols="30" rows="5" required></textarea>
                    <label class="form-label col-md-12" for="price">Price:</label>
                    <input class="form-control col-md-12 mt-2 mb-3" type="number" name="price" id="price" step="0.01" required>
                    <label class="form-label col-md-12" for="img">Image:</label>
                    <input class="form-control mb-3" type="file" name="img" id="img">
                    <label class="form-label col-md-12" for="url_img">Image URL:</label>
                    <input class="form-control mb-3" type="text" name="url_img" id="url_img">
                    <button type="submit" class="btn btn-success">Register</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
