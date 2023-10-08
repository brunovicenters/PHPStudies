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
                        <?php
                        $counter = 0;
                        foreach ($products as $product) :
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
                                    <a class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $counter ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal<?= $counter ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editModalLabel">Are you sure you want to edit <?= $products[$counter]['name'] ?>?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update_product.php?id=<?= $products[$counter]['id'] ?>" method="post" class="col-md-12" enctype="multipart/form-data">
                                                        <label class="form-label col-md-12" for="name">Name:</label>
                                                        <input class="form-control col-md-12 mt-2 mb-3" type="text" name="name" id="name" required value="<?= $products[$counter]["name"] ?>">
                                                        <label class="form-label col-md-12 mb-2" for="description">Description:</label>
                                                        <textarea class="form-control col-md-12 mt-2 mb-3" name="description" id="description" cols="30" rows="5" required><?= $products[$counter]["description"] ?></textarea>
                                                        <label class="form-label col-md-12" for="price">Price:</label>
                                                        <input class="form-control col-md-12 mt-2 mb-3" type="number" name="price" id="price" step="0.01" required value="<?= $products[$counter]["price"] ?>">
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <!-- It sends a request to delete product -->
                                    <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $counter ?>">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="deleteModal<?= $counter ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure you want to delete <?= $products[$counter]['name'] ?>?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="delete_product.php?id=<?= $product['id'] ?>" type="btn" class="btn btn-danger">Delete</a>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $counter++;
                        endforeach; ?>
                    </tbody>
                </table>
                <a href="admin_panel.php" class="btn btn-secondary">Go back</a>


            </div>
        </div>
    </div>
</body>

</html>