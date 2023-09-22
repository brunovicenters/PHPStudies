<?php
session_start();

require_once('../../connection/connection.php');

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM administrator WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute([$_GET['id']]);
    $admin = $query->fetch(PDO::FETCH_ASSOC);
    if (!$admin) {
        header("Location:index_admin.php?errorDel");
        exit();
    } else {
        $sql = "DELETE FROM administrator WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute([$_GET['id']]);
        header("Location:index_admin.php?warningDel");
        exit();
    }
}
