<?php
// It starts the session --
session_start();

// Require the DB connection file --
require_once('../connection/connection.php');

// Sanitize and store the POST value into a variable --
$user = htmlspecialchars($_POST["user"]);
$password = $_POST['password'];

// sql line to search admin in DB --
$sql = "SELECT * FROM administrator WHERE admin_user = :user AND admin_password = :password 
AND admin_active = 1";

// it searches in the DB, guaranteeing the safety of the DB --
$query = $pdo->prepare($sql);

// it tells that it's a string + bind ":user" to $user --
$query->bindParam(':user', $user, PDO::PARAM_STR);

// it tells it's a string + bind ":password" to $password --
$query->bindParam(':password', $password, PDO::PARAM_STR);

// execute the query on DB
$query->execute();

// It checks if the query was able to find a result --
if ($query->rowCount() > 0) {
    // It sets the session var as true --
    $_SESSION["admin_login"] = true;
    // It redirects you to "admin_panel" page --
    header("Location:admin_panel.php");
    // Stops the code --
    exit();
} else {
    // It redirect you to "login" page --
    header("Location:login.php?error");
    // Stops the code --
    exit();
}
