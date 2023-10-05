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

// It checks if the request method is the GET method --
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    try {
        $sql = "SELECT * FROM products WHERE id = :id";
        $query = $pdo->prepare(($sql));

        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $product = $query->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            header("Location:read_products.php");
            exit();
        }
    } catch (PDOException $err) {
        echo "Error: " . $err->getMessage();
    }
} else {
    header("Location:read_products.php");
    exit();
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // It checks if the request method is the POST method --
//     if (!empty($_POST)) {
//         $id = isset($_POST['id']) ? $_POST['id'] : "";
//         $name = isset($_POST['name']) ? $_POST['name'] : "";
//         $description = isset($_POST['description']) ? $_POST['description'] : "";
//         $price = isset($_POST['price']) ? $_POST['price'] : "";

//         try {
//             $sql = "UPDATE products SET name=?, description=?, price=? WHERE id=?";
//             $query = $pdo->prepare($sql);
//             $query->execute([$name, $description, $price, $id]);

//             header('Location: read_products.php');
//             exit();
//         } catch (PDOException $err) {
//             echo "Error: " . $err->getMessage();
//         }
//     } else {
//         header('Location: admin_panel.php');
//         exit();
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">

<!-- Imports the head template -->
<?php include "../template/head.php" ?>

<body>
    <h1 class="h1 text-center mt-3">Update Product</h1>
    <div class="container">
        <div class="row">
            <form action="update_product.php?id=<?= $product['id'] ?>" method="post" class="col-md-12" enctype="multipart/form-data">
                <label class="form-label col-md-12" for="name">Name:</label>
                <input class="form-control col-md-12 mt-2 mb-3" type="text" name="name" id="name" required value="<?= $product["name"] ?>">
                <label class="form-label col-md-12 mb-2" for="description">Description:</label>
                <textarea class="form-control col-md-12 mt-2 mb-3" name="description" id="description" cols="30" rows="5" required><?= $product["description"] ?></textarea>
                <label class="form-label col-md-12" for="price">Price:</label>
                <input class="form-control col-md-12 mt-2 mb-3" type="number" name="price" id="price" step="0.01" required value="<?= $product["price"] ?>">
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
        <a href="read_products.php" class="btn btn-secondary mt-4">Go back</a>
    </div>
</body>

</html>

<?php
