<?php 
    //Function --

    $nome = "Carlos Pereira";

    function exibeNome(){
        // Variables only work inside the enviroment they were created in --
        // echo $nome; -- won't work, the variable only exists outside the funciton, it needs to be global;
        // Turned the variable into global, so you can use everywhere;
        global $nome;
        echo $nome;
        echo '<hr>';

        $x = 6;
        $y = 7;
        $soma = $x + $y;
        echo $soma;
        echo '<hr>';
    }

    exibeNome();

    function exibeCidade(){
        global $cidade;
        $cidade = "São Paulo";
    }

    exibeCidade();
    // The variable only exists inside the function -- 
    echo $cidade; // It won't work without global;
    echo "<hr>";

    //********************************************************************************
    
    // You can pass arguments with "$value" and separate them with "," -- 
    function addNumbs($num1, $num2) {
        echo "$num1 + $num2 = ".$num1 + $num2;
    }

    addNumbs(4,5);
