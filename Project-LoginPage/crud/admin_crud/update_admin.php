<?php
// It stars the session --
session_start();

// It requires de DB connection file --
require_once('../../connection/connection.php');

// It checks if the GET "id" value exists --
if (isset($_GET['id'])) {
    // Create the sql line to find the admin --
    $sql = "SELECT * FROM administrator WHERE id=?";

    // It prepares the query --
    $query = $pdo->prepare($sql);

    // It executes the query using the GET id value as param --
    $query->execute([$_GET['id']]);

    // It stores the query result in a variable --
    $admin = $query->fetch(PDO::FETCH_ASSOC);

    // It checks if it's not empty --
    if ($admin) {

        // It checks if the super global POST isn't empty --
        if (!empty($_POST)) {

            // If POST vars exist, store it in variable, if not, pass empty string --
            $user = isset($_POST['user']) ? $_POST['user'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $active = isset($_POST['active']) ? $_POST['active'] : '';

            // It create sql line updating specific admin --
            $sql = "UPDATE administrator SET admin_user=?, admin_password=?, 
        admin_active=? WHERE id=?";

            // It prepares the query --
            $query = $pdo->prepare($sql);

            // It execute the query --
            $query->execute([$user, $password, $active, $_GET['id']]);

            // It redirects you to "index admin" page with GET value --
            header("Location:index_admin.php?successEdit");

            // It stops the code --
            exit();
        }
    } else {
        // It redirects you to "index admin" page with GET value --
        header("Location:index_admin.php?errorEdit");

        // It stops the code --
        exit();
    }
} else {
    // It redirects you to "index admin" page with GET value --
    header("Location:index_admin.php?errorEdit");

    // It stops the code --
    exit();
}
