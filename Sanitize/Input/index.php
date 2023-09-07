<?php
    //filter_input(type,'input_name', filter, option);
    // FILTER_SANITIZE_STRING -> Filters strings;
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    
    // FILTER_SANITIZE_EMAIL -> Filters email
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // You can use specific filters with options --
    $options = ['options' => array('min_range'=>0, "max_range"=>100)];
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, $options);

    if(!empty($name) && !empty($email) && !empty($age)){
        echo "Nome: $name <br> Email: $email <br> Idade: $age";
        
    } else {
        echo "Por favor, preencha todos os campos corretamente!";
    }
    echo "<hr>";

?>