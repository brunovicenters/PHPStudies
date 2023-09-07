<?php
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

    $msg = filter_input(INPUT_POST, "msg", FILTER_SANITIZE_STRING);

    if(!empty($name) && !empty($email) && !empty($msg)){
        echo "Name: $name <br> Email: $email <br> Mensagem: $msg";
    } else {
        echo "Please, do not leave any input empty";
    }
?>