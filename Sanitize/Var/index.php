<?php
    $email = "test@example.com";
    //filter_var($var_name, filter, options);
    $clean_email = filter_var($email, FILTER_SANITIZE_EMAIL);

    echo $clean_email.'<hr>';

    // You can make custom(and optional) options, using as a more advanced configuration --
    $options = [
        "flags" => FILTER_FLAG_IPV4
    ];

    $ip = filter_var("192.168.1.1", FILTER_VALIDATE_IP, $options);
    
    echo "$ip <hr>";
