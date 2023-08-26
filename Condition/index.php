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

    //*****************************************************************************************

    // Switch case --
    $cor = "vermelho";

    // You write switch(condition) --
    switch($cor):

        // Create the possibilities (cases) --
        case "vermelho":
            echo "Cor escolhida: vermelho";
            // You end the case --
            break;

        case "amarelo":
            echo "Cor escolhida: amarelo";
            break;

        case "laranja":
            echo "Cor escolhida: laranja";
            break;

        // Create a default return -- 
        default:
            echo "Cor escolhida não é vermelho, nem amarelo e nem laranja";

    // End the switch -- 
    endswitch;

    echo "<hr>";

    //***********************************************************************************

    // Exercise --
    $dia = 2;

    switch($dia):
        case 1:
            echo "Hoje é Domingo";
            break;
    
        case 2:
            echo "Hoje é Segunda-feira";
            break;

        case 3:
            echo "Hoje é Terça-feira";
            break;

        case 4:
            echo "Hoje é Quarta-feira";
            break;

        case 5:
            echo "Hoje é Quinta-feira";
            break;
        
        case 6:
            echo "Hoje é Sexta-feira";
            break;

        case 7:
            echo "Hoje é Sábado";
            break;

        default:
            echo "Esse dia não existe";
    endswitch;
    
    echo "<hr>";

    //***********************************************************************************

    // Exercise --
    $idade = 20;

    switch($idade){
        case $idade < 18:
            echo "Você é menor de idade.";
            break;
        
        case $idade >= 18 && $idade <= 30:
            echo "Você é um jovem adulto.";
            break;

        case $idade > 30 && $idade <= 60:
            echo "Você é um adulto.";
            break;
        
        case $idade > 60:
            echo "Você é um idoso";
            break;

        default:
            echo "Idade inválida";
    }
    echo '<hr>';

    //***********************************************************************************

    // Exercise --
    $mes = 2;

    switch($mes):
        case 1:
            echo "Janeiro";
            break;
    
        case 2:
            echo "Fevereiro";
            break;

        case 3:
            echo "Março";
            break;

        case 4:
            echo "Abril";
            break;

        case 5:
            echo "Maio";
            break;
        
        case 6:
            echo "Junho";
            break;

        case 7:
            echo "Julho";
            break;

        case 8:
            echo "Agosto";
            break;

        case 9:
            echo "Setembro";
            break;

        case 10:
            echo "Outubro";
            break;

        case 11:
            echo "Novembro";
            break;

        case 12:
            echo "Dezembro";
            break;

        default:
            echo "Esse mês não existe";
    endswitch;

    echo '<hr>';

    //***********************************************************************************

    // Exercise --
    $nota = 7;

    switch($nota){
        case $nota < 6:
            echo "Sua nota foi $nota. Ela é insuficiente.";
            break;
        
        case $nota === 6:
            echo "Sua nota foi $nota. Ela é suficiente.";
            break;

        case $nota === 7:
            echo "Sua nota foi $nota. Ela é boa.";
            break;
        
        case $nota === 8:
            echo "Sua nota foi $nota. Ela é muito boa.";
            break;

        case $nota >= 9:
            echo "Sua nota foi $nota. Ela é excelente.";
            break;

        default:
            echo "Nota inválida!";
    }
    echo '<hr>';
?>
