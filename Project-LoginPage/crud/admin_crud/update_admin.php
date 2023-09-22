<?php
session_start();

require_once('../../connection/connection.php');

if (isset($_GET['id'])) {

    $sql = "SELECT * FROM administrator WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute([$_GET['id']]);
    $admin = $query->fetch(PDO::FETCH_ASSOC);
    if ($admin) {
        if (!empty($_POST)) {

            $user = isset($_POST['user']) ? $_POST['user'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $active = isset($_POST['active']) ? $_POST['active'] : '';

            $sql = "UPDATE administrator SET admin_user=?, admin_password=?, 
        admin_active=? WHERE id=?";
            $query = $pdo->prepare($sql);
            $query->execute([$user, $password, $active, $_GET['id']]);

            header("Location:index_admin.php?successEdit");
            exit();
        }
    } else {
        header("Location:index_admin.php?errorEdit");
    }
} else {
    header("Location:index_admin.php?errorEdit");
    exit();
}
