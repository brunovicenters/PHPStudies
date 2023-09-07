<?php 
    header('Content-Type: text/html; charset=utf-8');
    // isset() verifies if exists and empty() verifies if its empty --
    if(isset($_POST['name']) 
    && !empty($_POST['name']) 
    && isset($_POST['email']) 
    && !empty($_POST['email'])){
        $name = $_POST['name'];
        $email = $_POST['email'];

        echo "Nome: $name <br> E-mail: $email";
    }
?>