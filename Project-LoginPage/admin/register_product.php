<?php
// It stars the session --
session_start();
// It requires the DB connection file --
require_once('../connection/connection.php');

// It checks if the session variable doesn't exist --
if (!isset($_SESSION["admin_login"])) {
    // redirect to "login" page --
    header("Location:login.php");
    // stops the code --
    exit();
}

// It checks if the request method is the POST method --
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // It stores the POST values into variables --
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $img = $_FILES['img']['name'];

    // It defines the target dir --
    $target_dir = "../assets/";
    // It defines the location of the file --
    $target_file = $target_dir . basename($img);

    // It defines the base url to the project --
    $base_url = "http://localhost/PHPStudies/Project-LoginPage/";
    // It defines the link to the img --
    $url_img = $base_url . "assets/" . basename($img);

    // It tries to upload the file to the folder --
    if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
        echo "Image" . basename($img) . "was loaded";
    } else {
        echo "Failed to load image";
    }

    try {
        // Create a sql line to create a new product --
        $sql = "INSERT INTO products (name,description,price,img,url_img) 
    VALUES (:name, :description, :price, :img, :url_img)";

        // Prepare the query --
        $query = $pdo->prepare($sql);

        // Bind the var to the correct params --
        $query->bindParam(":name", $name, PDO::PARAM_STR);
        $query->bindParam(":description", $description, PDO::PARAM_STR);
        $query->bindParam(":price", $price, PDO::PARAM_STR);
        $query->bindParam(":img", $img, PDO::PARAM_STR);
        $query->bindParam(":url_img", $url_img, PDO::PARAM_STR);

        // Execute the query --
        $query->execute();

        // In case all goes well, show success message --
        echo "<p style='color:green;'>Successfully registered</p>";
    } catch (PDOException $err) { // It stores the error or exception in a variable --
        // Shows the error --
        echo "<p style='color:red;'>Error while trying to register product!</p>";
        echo $err->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Imports the head template -->
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
                    <input class="form-control mb-3" type="file" name="img" id="img" required>
                    <button type="submit" class="btn btn-success">Register</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
