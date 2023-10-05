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

if (isset($_GET['id'])) {
    // It checks if the request method is the POST method --
    if (!empty($_POST)) {
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $description = isset($_POST['description']) ? $_POST['description'] : "";
        $price = isset($_POST['price']) ? $_POST['price'] : "";

        try {
            $sql = "UPDATE products SET name=?, description=?, price=? WHERE id=?";
            $query = $pdo->prepare($sql);
            $query->execute([$name, $description, $price, $_GET['id']]);

            header('Location: read_products.php');
            exit();
        } catch (PDOException $err) {
            echo "Error: " . $err->getMessage();
        }
    } else {
        header('Location: admin_panel.php');
        exit();
    }
}
