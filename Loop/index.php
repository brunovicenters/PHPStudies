<?php
    // For --
    for($i=0;$i<2;$i++){
        if($i==3){
            echo '<br> A quantidade de mundias do SP é:';
        }
        echo '<br>' .$i;
    }

    echo '<hr>';

    //***********************************************************************************

    // While --
    $contador = 1;
    // while(condition){code} --
    while($contador <= 2):
        echo "Contador é $contador <br>";
        $contador++;
    // End loop --
    endwhile;

    echo "<hr>";

    //***********************************************************************************
    
    // Exercise --

    $input = 2;
    $number = 1;
    $soma = 0;
    while($number <= $input){
        $soma = ($number*$number) + $soma;
        echo "A soma é $soma <br>";
        $number++;
    }

    echo "<hr>";

    //***********************************************************************************
    
    // Do while --
    $num = 1;
    do{
        echo 'Hello <br>';
        $num++;
    } while ($num < 2);

    echo "<hr>";

    //***********************************************************************************

    // Exercise --

    $tabuada = 2;
    $i = 1;

    do{
        echo $tabuada*$i."<br>";
        $i++;
    } while($i<=3);

    echo "<hr>";

    //***********************************************************************************

    // Exercise --

    $l = 3;

    do{
        echo $l."<br>";
        $l--;
    } while($l>=1);

    echo "<hr>";

    //***********************************************************************************

    // Exercise --
    
    $input = "12345";
    // Divide a string into a array with the caracters --
    $digits = str_split($input);
    $soma = 0;

    for($i=0;$i<count($digits);$i++):
        $soma += intval($digits[$i]);
    endfor;

    echo $soma;

    echo "<hr>";

    // Another solution --

    $N = 12345;
    $soma = 0;

    while($N>0){
        $soma += $N%10;
        // Gets only the int part of the number -- 
        $N = (int)($N/10);
    }

    echo "A soma dos dígitos é $soma <hr>";

    //***********************************************************************************

    // Foreach --
    $colors = ["blue", "red", "green"];
    // It will loop for each element on array (like a .map on JS) --
    foreach($colors as $color){
        echo "Color $color <br>";
    }

    echo "<hr>";

    $cars = ["fusca", "sandero", "camaro"];
    // You get the key and the value --
    foreach($cars as $key => $car){
        echo "$key - $car <br>";
    }

    echo "<hr>";

    //***********************************************************************************
    
    // Exercise --
    $numbers = [1,2,3,4,5];
    $numbersInverso = [];

    $index = count($numbers);

    foreach($numbers as $number){
        $index--;
        $numbersInverso [] = $numbers[$index];
    }
    print_r($numbersInverso);

    echo "<hr>";

    //***********************************************************************************

    // Continue --
    for($x=0; $x<4;$x++){
        if($x == 2){
            // Goes back to the beggining --
            continue; // -- You can use "break;" to end the loop; 
        }
        echo $x."<br>";
    }

?>