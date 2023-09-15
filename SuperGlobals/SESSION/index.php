<?php
    //You always need to start the session, to use it --
    session_start();

    //Define a session variable --
    $_SESSION["user"] = "João";
    $_SESSION["email"] = "joão@gmail.com";

    //Acces the session's var --
    $user = $_SESSION["user"]; 
    $email = $_SESSION["email"]; 
    echo $user;
    echo '<hr>';
    echo $email;
    echo '<hr>';

    //Removes a session's variable --
    unset($_SESSION["usuário"]);
    //Or can destroy the whole session --
    session_destroy();
?>