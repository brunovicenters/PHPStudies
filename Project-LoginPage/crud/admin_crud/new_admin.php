<?php
session_start();

require_once('../../connection/connection.php');

$user = htmlspecialchars($_POST["user"]);
$password = $_POST['password'];

$sql = "INSERT INTO administrator (id, admin_user, admin_password, admin_active) 
VALUES (NULL, :user, :password, '1');";

$query = $pdo->prepare($sql);
$query->bindParam(':user', $user, PDO::PARAM_STR);
$query->bindParam(':password', $password, PDO::PARAM_STR);
$query->execute();

if ($query->rowCount() > 0) {
    header("Location:../../admin/admin_panel.php?success");
    exit();
} else {
    header("Location:../../admin/admin_panel.php?error");
    exit();
}
