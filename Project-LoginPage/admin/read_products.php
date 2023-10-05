<?php
// It starts the session --
session_start();
// Require the DB connection file --
require_once('../connection/connection.php');

// It checks if the session variable doesn't exist --
if (!isset($_SESSION["admin_login"])) {
    // redirect to "login" page --
    header("Location:login.php");
    // stops the code --
    exit();
}

// Try the code --
try {
    // It creates the query to search for all the products --
    $query = $pdo->prepare("SELECT * FROM products");
    // Execute the code --
    $query->execute();
    // It stores the result in an array --
    $products = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $err) { // It stores the error or exception in the variable
    // It show the error --
    echo "Error:" . $err->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Import head template -->
<?php include "../template/head.php" ?>

<body>
    <div class="container">
        <div class="row">
            <h1 class="h1 text-center">Products</h1>
            <div class="col-md-10 offset-md-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Create a foreach, for each product encountered -->
                        <?php foreach ($products as $product) :
                        ?>
                            <tr>
                                <!-- It shows the id of the product -->
                                <td><?= $product["id"] ?></td>
                                <!-- It shows the image + assign the link of the product -->
                                <td><a href="<?= $product["url_img"] ?>" target="_blank"><img src="<?= $product["url_img"] ?>" alt="<?= $product["description"] ?>" width="50"></a></td>

                                <!-- It shows the name of the product -->
                                <td class="text-uppercase"><?= $product["name"] ?></td>
                                <!-- It shows the description of the product -->
                                <td><?= $product["description"] ?></td>
                                <!-- It shows the price of the product -->
                                <td>$<?= $product["price"] ?></td>
                                <td>
                                    <!-- It sends a request to edit page -->
                                    <a href="edit_product.php?id=<?= $product['id'] ?>" class="btn btn-outline-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <!-- It sends a request to delete admin -->
                                    <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="admin_panel.php" class="btn btn-secondary">Go back</a>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure you want to delete <?= $product['name'] ?>?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <a href="delete_product.php?id=<?= $product['id'] ?>" type="btn" class="btn btn-danger">Delete</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>