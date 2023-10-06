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

// It checks if there's a GET id value -- 
if (isset($_GET['id'])) {
    // It checks if the request POST is not empty --
    if (!empty($_POST)) {
        // It stores the POST values in variables --
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $description = isset($_POST['description']) ? $_POST['description'] : "";
        $price = isset($_POST['price']) ? $_POST['price'] : "";

        // Tries the sql line --
        try {
            // Writes the sql line to update product --
            $sql = "UPDATE products SET name=?, description=?, price=? WHERE id=?";
            // It prepares the query --
            $query = $pdo->prepare($sql);
            // Executes the query passing the earlier variables as params --
            $query->execute([$name, $description, $price, $_GET['id']]);

            // Redirects you to "read products" page --
            header('Location: read_products.php');
            // It stops the code --
            exit();
        } catch (PDOException $err) { // It stores the error or exception in the variable
            // Print error message --
            echo "Error: " . $err->getMessage();
        }
    } else {
        // Redirects you to "admin panel" page --
        header('Location: admin_panel.php');
        // It stops the code --
        exit();
    }
}
