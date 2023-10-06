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

if (isset($_GET['id'])) {
    // Create the sql line to find the product --
    $sql = "SELECT * FROM products WHERE id=?";

    // It prepares the query --
    $query = $pdo->prepare($sql);

    // It executes the query using the GET id value as param --
    $query->execute([$_GET['id']]);

    // It stores the query result in a variable --
    $product = $query->fetch(PDO::FETCH_ASSOC);

    // It checks if it's empty --
    if (!$product) {
        // Redirects you to the "read product" page, with a GET value --
        header("Location:read_products.php");

        // Stops the code --
        exit();
    } else {
        // Create a sql line, to delete an product --
        $sql = "DELETE FROM products WHERE id=?";

        // Prepares the query --
        $query = $pdo->prepare($sql);

        // Executes the query using the GET id value as param--
        $query->execute([$_GET['id']]);

        // Redirects you to the "read product" page, with a GET value --
        header("Location:read_products.php");

        // Stops the code --
        exit();
    }
}
