<?php
    $nota1 = 4;
	$nota2 = 8;
	$media = ($nota1+$nota2)/2;

    $nome = "Pizza";

	$idade = 20;

	$price = 23.6;

	$isHandsome = true;

    //*****************************************************************************************

    // Conditions
    if($media >= 6){
        echo "Aluno aprovado!";
    } else {
        echo "Aluno reprovado!";
    }
    echo "<hr>";

    // is_string() - To see if it is a string
    if(is_string($nome)){
        echo "É uma string";
    } else{
        echo "Não é uma string";
    }
    echo "<hr>";

    // is_int() - To see if it is a int
    if(is_int($idade)){
        echo "É um inteiro";
    } else{
        echo "Não é um inteiro";
    }
    echo "<hr>";

    // is_float() - To see if it is a float
    if(is_float($idade)){
        echo "É um float";
    } else{
        echo "Não é um float";
    }
    echo '<hr>';

    // is_bool() - To see if it is a boolean
    if(is_bool($isHandsome)){
        echo "É um booleano";
    } else{
        echo "Não é um booleano";
    }
    echo "<hr>";
?>