<?php

    if(isset($_POST['name'], $_POST['age'], $_POST['email'], $_POST['ws']) 
    && !empty($_POST['name']) 
    && !empty($_POST['age']) 
    && !empty($_POST['email']) 
    && !empty($_POST['ws'])){

        $options = [ 'options' =>
            array('min_range'=>0)
        ];

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, $options);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $ws = filter_input(INPUT_POST, 'ws', FILTER_SANITIZE_STRING);

        if($age === false){
            echo "Insert valid age"; 
        } else if($email === false){
            echo "Insert valid email";
        } else {
            echo "Name: $name <br> Age: $age <br> Email: $email <br> Workshop: $ws";
        }
    }
?>