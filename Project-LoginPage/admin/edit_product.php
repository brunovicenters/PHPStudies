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
    // Checks if there's a GET id value --
    if (isset($_GET['id'])) {
        // Stores the GET id value in a variable --
        $id = $_GET['id'];
    }

    // Tries the sql line -- 
    try {
        // Writes the sql line --
        $sql = "SELECT * FROM products WHERE id = :id";
        // Prepares the query --
        $query = $pdo->prepare(($sql));
        // Binds the placeholder ":id" to the variable "$id" --
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        // Executes the query --
        $query->execute();

        // Stores the query result in a variable --
        $product = $query->fetch(PDO::FETCH_ASSOC);

        // Checks if product exists --
        if (!$product) {
            // Redirects you to "read products" page --
            header("Location:read_products.php");
            // It stops the code --
            exit();
        }
    } catch (PDOException $err) { // It stores the error or exception in the variable
        // Prints the error message --
        echo "Error: " . $err->getMessage();
    }
} else {
    // Redirects to "read products" page --
    header("Location:read_products.php");
    // Stops the code --
    exit();
}

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
