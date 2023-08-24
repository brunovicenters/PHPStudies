<?php 
    // Variable Scope --
     
    $nome = "Carlos Pereira";

    // Turns the variable into global inside functions and etc;
    global $nome;

    //******************************************************************************

    // Const
    // Creates a constant variable --
    define("NOME", "Vicente de Paula");
    echo NOME;
    echo "<hr>";

    // It will break because it already has a value (and can't be replaced) --
    // define("NOME", "Sara de Almeida");

    define('IDADE', 20);
    define('ALTURA', 1.80);
    define('CASADO', false);
    echo "Meu nome é ".NOME.", tenho ".IDADE." anos e ".ALTURA."m de altura";
    echo "<hr>";

    define('TIMES',['Santos', 'Flamengo', 'Bahia']);
    print_r(TIMES[2]);

?>