<?php
// It starts the session --
session_start();

// It requires de DB connection file --
require_once('../../connection/connection.php');

// Sanitize and store the POST value into a variable --
$user = htmlspecialchars($_POST["user"]);
$password = $_POST['password'];

// Create a sql line, to delete an admin --
$sql = "INSERT INTO administrator (id, admin_user, admin_password, admin_active) 
VALUES (NULL, :user, :password, '1');";

// Prepares the query --
$query = $pdo->prepare($sql);

// Bind the variables to the params --
$query->bindParam(':user', $user, PDO::PARAM_STR);
$query->bindParam(':password', $password, PDO::PARAM_STR);

// Executes the query --
$query->execute();

// It checks if the query was able to find a result --
if ($query->rowCount() > 0) {
    // It redirects you to "admin panel" page with a GET value --
    header("Location:../../admin/admin_panel.php?success");

    // It stops the code --
    exit();
} else {
    // It redirects you to "admin panel" page with a GET value --
    header("Location:../../admin/admin_panel.php?error");

    // It stops the code --
    exit();
}
