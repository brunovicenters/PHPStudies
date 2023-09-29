<?php
session_start();
require_once('../connection/connection.php');
if (!isset($_SESSION["admin_login"])) {
    // redirect to another location --
    header("Location:login.php");
    exit();
}

try {
    $query = $pdo->prepare("SELECT * FROM products");
    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $err) {
    echo "Error:" . $err->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include "../template/head.php" ?>

<body>
    <div class="container">
        <div class="row">
            <h1 class="h1 text-center">Products</h1>
            <table class="table col-md-12">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Url_image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) :
                    ?>
                        <tr>
                            <td><?= $product["id"] ?></td>
                            <td class="text-uppercase"><?= $product["name"] ?></td>
                            <td><?= $product["description"] ?></td>
                            <td><?= $product["price"] ?></td>
                            <td><img src="<?= $product["url_img"] ?>" alt="<?= $product["description"] ?>" width="50"></td>
                            <td><?= $product["url_img"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>