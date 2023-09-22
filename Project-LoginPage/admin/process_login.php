<?php
session_start();

// require the file --
require_once('../connection/connection.php');

$user = htmlspecialchars($_POST["user"]);
$password = $_POST['password'];

// sql code to search admin in DB --
$sql = "SELECT * FROM administrator WHERE admin_user = :user AND admin_password = :password 
AND admin_active = 1";

// it searches in the DB, garanteeing the safety of the DB --
$query = $pdo->prepare($sql);

// it tells it's a string + bind ":user" to $user --
$query->bindParam(':user', $user, PDO::PARAM_STR);

// it tells it's a string + bind ":password" to $password --
$query->bindParam(':password', $password, PDO::PARAM_STR);

$query->execute();

if ($query->rowCount() > 0) {
    $_SESSION["admin_login"] = true;
    header("Location:admin_panel.php");
    exit();
} else {
    header("Location:login.php");
    exit();
}
