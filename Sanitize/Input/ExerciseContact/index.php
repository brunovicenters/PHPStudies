<?php
    if(isset($_POST['name'], $_POST['email'], $_POST['msg']) 
    && !empty($_POST['name']) 
    && !empty($_POST['email']) 
    && !empty($_POST['msg'])){
        
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $msg = filter_input(INPUT_POST, "msg", FILTER_SANITIZE_STRING);

        if($email === false){
            echo "Enter valid email!";
        } else {
            echo "Name: $name <br> Email: $email <br> Mensagem: $msg";
        }
    } else {
        echo "Please, do not leave any input empty";
    }
?>