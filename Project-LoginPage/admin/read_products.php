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
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Create a foreach, for each product encountered -->
                        <?php foreach ($products as $product) :
                        ?>
                            <tr>
                                <!-- It shows the id of the product -->
                                <td><?= $product["id"] ?></td>
                                <!-- It shows the name of the product -->
                                <td class="text-uppercase"><?= $product["name"] ?></td>
                                <!-- It shows the description of the product -->
                                <td><?= $product["description"] ?></td>
                                <!-- It shows the price of the product -->
                                <td>$<?= $product["price"] ?></td>
                                <!-- It shows the image + assign the link of the product -->
                                <td><a href="<?= $product["url_img"] ?>" target="_blank"><img src="<?= $product["url_img"] ?>" alt="<?= $product["description"] ?>" width="50"></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="/PHPStudies/Project-LoginPage/admin/admin_panel.php" class="btn btn-secondary">Go back</a>
            </div>
        </div>
    </div>
</body>

</html>